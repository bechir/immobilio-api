<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Controller\Api;

use App\Entity\CptOperationCaisse;
use App\Repository\CptMoyenPaiementRepository;
use App\Repository\CptNatureOperationCaisseRepository;
use App\Repository\CptOperationCaisseRepository;
use App\Repository\PatSciRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
     * La somme des paiements de factures sur une période (année) par Agence.
     * Les sommes seront aggrégées par mois
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int           agenceId: Identifiant de l'agence
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/paiement-factures/etat/agence/{agenceId}/{dateDebut}/{dateFin}")
     */
    public function getEtatPaiementsFactureAgence(int $agenceId, string $dateDebut = null, string $dateFin = null)
    {
        $operations = $this->operationRepository->getEtatPaiementsFactureAgence($agenceId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations, $dateDebut, $dateFin));
    }

    /**
     * La somme des paiements de factures sur une période (année) par SCI.
     * Les sommes seront aggrégées par mois
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int           sciId: Identifiant du Sci
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/paiement-factures/etat/sci/{sciId}/{dateDebut}/{dateFin}")
     */
    public function getEtatPaiementsFactureSci(int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        $operations = $this->operationRepository->getEtatPaiementsFactureSci($sciId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations, $dateDebut, $dateFin));
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
        $operations = $this->operationRepository->getEtatPaiementFacturesBienImmobilier($bienImmobilierId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations, $dateDebut, $dateFin));
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
        $list = $this->operationRepository->getEtatPaiementFacturesModePaiement($dateDebut, $dateFin);

        return $this->json(
            $this->totalizeByMonth($list, $cptMoyenPaiementRepository, 'moyenPaiement', 'code', 'libelle')
        );
    }

    /**
     * La somme des dépenses réalisées sur une période (année) par SCI
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int            sciId: Identifiant du Sci
     * @param string|null    dateDebut: Date de début
     * @param string|null    dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/sci/{sciId}/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesSci(int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        $operations = $this->operationRepository->getEtatDepensesSci($sciId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations, $dateDebut, $dateFin));
    }

    /**
     * La somme des dépenses réalisées sur une période (année) par Agence
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int            agenceId: Identifiant de l'agence
     * @param string|null    dateDebut: Date de début
     * @param string|null    dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/agence/{agenceId}/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesAgence(int $agenceId, string $dateDebut = null, string $dateFin = null)
    {
        $operations = $this->operationRepository->getEtatDepensesAgence($agenceId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations, $dateDebut, $dateFin));
    }

    /**
     * La somme des dépenses réalisées sur une période (année) par Agence, flitré par SCI
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int            agenceId: Identifiant de l'agence
     * @param string|null    dateDebut: Date de début
     * @param string|null    dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/agence-filtre-par-sci/{agenceId}/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesAgenceParSci(PatSciRepository $sciRepository, int $agenceId, string $dateDebut = null, string $dateFin = null)
    {
        $operations = $this->operationRepository->getEtatDepensesAgence($agenceId, $dateDebut, $dateFin, false);

        if(!$operations)
            return $this->json(null);

        $scisAgence = $sciRepository->findBy(['codeAgence' => $operations[0]->getCodeAgence()]);

        $grouped = [];

        foreach ($scisAgence as $sci) {
            $grouped[$sci->getLibelle()] = $this->initializeMonths($dateDebut, $dateFin);

            foreach ($operations as $operation) {
                if($operation->getSci() && $operation->getSci()->getId() == $sci->getId()) {
                    foreach (array_keys($grouped[$sci->getLibelle()]) as $date) {
                        if($date == $operation->getDateOperation()->format('Y-m')) {
                            $grouped[$sci->getLibelle()][$date] += $operation->getMontant();
                        }
                    }
                }
            }
        }

        return $this->json($grouped);

        return $this->json($this->groundAndSumOperations($operations, $dateDebut, $dateFin));
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
        $operations = $this->operationRepository->getEtatDepensesBienImmobilier($bienImmobilierId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations, $dateDebut, $dateFin));
    }

    /**
     * La somme des dépenses réalisées sur une période (année) pour une nature de dépenses.
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int           natureId: Identifiant de la nature de dépense
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/nature-depense/{natureId}/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesPourUneNatureDepense(int $natureId, string $dateDebut = null, string $dateFin = null)
    {
        $operations = $this->operationRepository->getEtatDepensesPourUneNatureDepense($natureId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations, $dateDebut, $dateFin));
    }

    /**
     * La somme des dépenses réalisées sur une période (année) par nature de la dépenses.
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/nature-depense/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesParNatureDepense(CptNatureOperationCaisseRepository $natureRepository, string $dateDebut = null, string $dateFin = null)
    {
        $list = $this->operationRepository->getEtatDepensesParNatureDepense($dateDebut, $dateFin);

        return $this->json(
            $this->totalizeByMonth($list, $natureRepository, 'nature', 'id', 'label')
        );
    }

    /**
     * La somme des dépenses réalisées sur une période (année) par nature de la dépense pour une agence.
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int           agenceId: Identifiant de l'agence
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/operation-caisse/depense/etat/nature-depense-par-agence/{agenceId}/{dateDebut}/{dateFin}")
     */
    public function getEtatDepensesParNatureDepenseParAgence(CptNatureOperationCaisseRepository $natureRepository, int $agenceId, string $dateDebut = null, string $dateFin = null)
    {
        $list = $this->operationRepository->getEtatDepensesParNatureDepense($agenceId, $dateDebut, $dateFin);

        $data = [];

        foreach ($natureRepository->findAll() as $nature) {
            $data[$nature->getLabel()] = 0;
        }

        foreach ($list as $operation) {
            $key = $operation['nature']['label'];
            if(array_key_exists($key, $data)) {
                $data[$key] += $operation['montant'];
            } else {
                $data[$key] = $operation['montant'];
            }
        }

        return $this->json($data);
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
        $operations = $this->operationRepository->getEtatDepensesNatureDepenseAgenceSci($natureId, $agenceId, $sciId, $dateDebut, $dateFin);

        return $this->json($this->groundAndSumOperations($operations, $dateDebut, $dateFin));
    }

    /**
     * La somme des encaissements sur une période (année) par agence.
     * Les sommes seront aggrégées par mois
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/operation-caisse/encaissement/etat/par-agence/{dateDebut}/{dateFin}")
     */
    public function getEncaissementParAgence(string $dateDebut = null, string $dateFin = null)
    {
        return $this->json(
            $this->operationRepository->getEncaissementParAgence($dateDebut, $dateFin)
        );
    }

    /**
     * La somme des encaissements sur une période (année) par type de client.
     * Les sommes seront aggrégées par mois
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/operation-caisse/encaissement/etat/par-type-client/{dateDebut}/{dateFin}")
     */
    public function getEncaissementParTypeClient(string $dateDebut = null, string $dateFin = null)
    {
        return $this->json(
            $this->operationRepository->getEncaissementParTypeClient($dateDebut, $dateFin)
        );
    }

    /**
     * Evolutions des operations par type d'operation
     * Les sommes seront aggrégées par mois
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param string|null   dateDebut: Date de début
     * @param string|null   dateFin: date de fin
     *
     * @Route("/operation-caisse/par-type-operation/{dateDebut}/{dateFin}")
     */
    public function getOperationsByType(string $dateDebut = null, string $dateFin = null)
    {
        $operations = $this->operationRepository->getOperationsByType($dateDebut, $dateFin);
        $grouped = [];
        
        $grouped = array_fill_keys(
            array_unique(
                array_map(function($o) {
                    return $o['label'];
                }, $operations)
            ),
        []);

        foreach($operations as $operation) {
            $key = $operation['label'];
            $sub = $operation['month'];
            $grouped[$key][$sub] = $operation['value'];
        }

        return $this->json($grouped);
    }

    private function groundAndSumOperations($operations, $startDate = null, $endDate = null)
    {
        if(!$operations)
            return null;

        if(!$startDate || !$endDate) {
            [$start, $end] = $this->getDatesInterval($operations);
            $startDate = $startDate ?? $start;
            $endDate = $endDate ?? $end;
        }

        $grouped = $this->initializeMonths($startDate, $endDate);

        foreach ($operations as $operation) {
            $key = $operation['dateOperation']->format('Y-m');
            $grouped[$key] += $operation['montant'];
        }

        return $grouped;
    }

    /**
     * Group and totalize entires by month and by given category
     * 
     * @param CptOperationCaisse[] $operations
     * @param ServiceEntityRepository
     * @param string $properyName: property that refer to categories
     * @param string $code 
     * @param string $label: The label to display in result categories
     * @return array|null
     */
    public function totalizeByMonth(array $operations, ServiceEntityRepository $classRepository, string $properyName, string $code, string $label, $startDate = null, $endDate = null)
    {
        if(empty($operations)) {
            return null;
        }

        $keys = [];

        foreach ($classRepository->findAll() as $key) {
            $key = $this->dismount($key);
            $keys[$key[$code]] = $key[$label];
        }

        if(!$startDate || !$endDate) {
            [$start, $end] = $this->getDatesInterval($operations);
            $startDate = $startDate ?? $start;
            $endDate = $endDate ?? $end;
        }

        $months = $this->initializeMonths($startDate, $endDate);

        $grouped = array_combine(array_keys($months), array_map(function($month) use($keys){
            return array_fill_keys($keys, 0);
        }, $months));

        foreach ($operations as $operation) {
            $month = $operation['dateOperation']->format('Y-m');
            $key = $keys[$operation[$properyName][$code]];
            $grouped[$month][$key] += $operation['montant'];
        }

        return $grouped;
    }

    public function getDatesInterval($operations)
    {
        $start = $operations[0]['dateOperation'];
        $end = $operations[0]['dateOperation'];

        foreach ($operations as $operation) {
            if($start > $operation['dateOperation']) {
                $start = $operation['dateOperation'];
            }
            if($end < $operation['dateOperation']) {
                $end = $operation['dateOperation'];
            }
        }

        return [$start->format('Y-m'), $end->format('Y-m')];
    }

    public function initializeMonths(string $begin = null, string $end = null)
    {
        $begin = new \DateTime($begin ?? '-6 months');
        $end = new \DateTime($end);

        $array = [];

        for($i = $begin; $i <= $end; $i->modify('+1 month')){
            $array[$i->format("Y-m")] = 0;
        }

        return $array;
    }

    /**
     * Convert a PHP object to an associative array
     * https://stackoverflow.com/questions/4345554/convert-a-php-object-to-an-associative-array#answer-16023589
     * 
     * @param object
     * @return array
     */
    public function dismount($object) {
        $reflectionClass = new \ReflectionClass(get_class($object));
        $array = array();
        foreach ($reflectionClass->getProperties() as $property) {
            $property->setAccessible(true);
            $array[$property->getName()] = $property->getValue($object);
            $property->setAccessible(false);
        }
        return $array;
    }
}
