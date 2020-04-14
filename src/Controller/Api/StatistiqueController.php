<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Controller\Api;

use App\Repository\CptMoyenPaiementRepository;
use App\Repository\CptOperationCaisseRepository;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class StatistiqueController extends ApiController
{
    /**
     * @var CptOperationCaisseRepository
     */
    private $operationRepository;

    /**
     * Constructor.
     *
     * @var CptOperationCaisseRepository
     */
    public function __construct(CptOperationCaisseRepository $operationRepository)
    {
        $this->operationRepository = $operationRepository;
    }

    /**
     * La somme des paiements de factures sur une période (année) par Agence ou SCI.
     * Les sommes seront aggrégées par mois
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int           agenceId: Identifiant de l'agence
     * @param int           sciId: Identifiant du Sci
     * @param string|null   dateDebut: Date de début
     * @param string|mull   dateFin: date de fin
     *
     * @Route("/paiement-factures/etat/agence/{agenceId}/{sciId}/{dateDebut}/{dateFin}")
     */
    public function getEtatPaiementsFactureAgenceSci(int $agenceId, int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        if (!$dateDebut) {
            $dateDebut = (new DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$dateFin) {
            $dateFin = (new DateTime())->format('Y-m-d');
        }

        $operations = $this->operationRepository->getEtatPaiementsFactureAgenceSci($agenceId, $sciId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations));
    }

    /**
     * La somme des paiements de factures réalisés sur un Bien Immobilier sur une période (année).
     * Les sommes seront aggrégées par mois.
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int           bienImmobilierId: Identifiant du bien immobilier
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/paiement-factures/etat/bien-immobilier/{bienImmobilierId}/{dateDebut}/{dateFin}")
     */
    public function getEtatPaiementFacturesBienImmobilier(int $bienImmobilierId, string $dateDebut = null, string $dateFin = null)
    {
        if (!$dateDebut) {
            $dateDebut = (new DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$dateFin) {
            $dateFin = (new DateTime())->format('Y-m-d');
        }

        $operations = $this->operationRepository->getEtatPaiementFacturesBienImmobilier($bienImmobilierId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations));
    }

    /**
     * La somme des paiements de factures sur une période (année) par nature de paiement (espèces, banque ...).
     * Les sommes seront aggrégées par mois.
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param string|null    dateDebut: Date de début
     * @param string|null    dateFin: date de fin
     *
     * @Route("/paiement-factures/etat/mode-paiement/{dateDebut}/{dateFin}")
     */
    public function getEtatPaiementFacturesModePaiement(CptMoyenPaiementRepository $cptMoyenPaiementRepository, string $dateDebut = null, string $dateFin = null)
    {
        if (!$dateDebut) {
            $dateDebut = (new DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$dateFin) {
            $dateFin = (new DateTime())->format('Y-m-d');
        }

        $list = $this->operationRepository->getEtatPaiementFacturesModePaiement($dateDebut, $dateFin);

        $paymentMethods = [];
        $groupedResults = [];

        foreach ($cptMoyenPaiementRepository->findAll() as $method) {
            $paymentMethods[$method->getCode()] = $method->getLibelle();
        }

        foreach ($list as $operation) {
            $key = $operation['moyenPaiement']['code'];

            if (array_key_exists($key, $groupedResults)) {
                $groupedResults[$paymentMethods[$key]] += $operation['montant'];
            } else {
                $groupedResults[$paymentMethods[$key]] = $operation['montant'];
            }
        }

        return $this->json($groupedResults);
    }

    /**
     * La somme des dépenses réalisées sur une période (année) par Agence ou SCI
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int            agenceId: Identifiant de l'agence
     * @param int            sciId: Identifiant du Sci
     * @param string|null    dateDebut: Date de début
     * @param string|null    dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/agence/{agenceId}/{sciId}/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesAgenceSci(int $agenceId, int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        if (!$dateDebut) {
            $dateDebut = (new DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$dateFin) {
            $dateFin = (new DateTime())->format('Y-m-d');
        }

        $operations = $this->operationRepository->getEtatDepensesAgenceSci($agenceId, $sciId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations));
    }

    /**
     * La somme des dépenses réalisées sur une période (année) par Bien immobilier
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int            bienImmobilierId: Identifiant du bien immobilier
     * @param string|null    dateDebut: Date de début
     * @param string|null    dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/bien-immobilier/{bienImmobilierId}/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesBienImmobilier(int $bienImmobilierId, string $dateDebut = null, string $dateFin = null)
    {
        if (!$dateDebut) {
            $dateDebut = (new DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$dateFin) {
            $dateFin = (new DateTime())->format('Y-m-d');
        }

        $operations = $this->operationRepository->getEtatDepensesBienImmobilier($bienImmobilierId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations));
    }

    /**
     * La somme des dépenses réalisées sur une période (année) par nature de la dépenses.
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int           natureId: Identifiant de la nature de dépense
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/nature-depense/{natureId}/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesNatureDepense(int $natureId, string $dateDebut = null, string $dateFin = null)
    {
        if (!$dateDebut) {
            $dateDebut = (new DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$dateFin) {
            $dateFin = (new DateTime())->format('Y-m-d');
        }

        $operations = $this->operationRepository->getEtatDepensesNatureDepense($natureId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations));
    }

    /**
     * La somme des dépenses réalisées sur une période (année) par nature de la dépenses.
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int           natureId: Identifiant de la nature de dépense
     * @param int           agenceId : Identifiant de l'agence
     * @param int           sciId: Identifiant du Sci
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/nature-depense/{natureId}/{agenceId}/{sciId}/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesNatureDepenseAgenceSci(int $natureId, int $agenceId, int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        if (!$dateDebut) {
            $dateDebut = (new DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$dateFin) {
            $dateFin = (new DateTime())->format('Y-m-d');
        }

        $operations = $this->operationRepository->getEtatDepensesNatureDepenseAgenceSci($natureId, $agenceId, $sciId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations));
    }

    private function groundAndSumOperations($operations)
    {
        $grouped = [];

        foreach ($operations as $operation) {
            $key = $operation['dateOperation']->format('Y-m');

            if (array_key_exists($key, $grouped)) {
                $grouped[$key] += $operation['montant'];
            } else {
                $grouped[$key] = $operation['montant'];
            }
        }

        return $grouped;
    }
}
