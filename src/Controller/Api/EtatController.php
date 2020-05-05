<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Controller\Api;

use App\Repository\CmlFactureRepository;
use App\Repository\CptOperationCaisseRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/etat")
 *
 * @IsGranted("ROLE_ADMIN")
 */
class EtatController extends ApiController
{
    /**
     * LISTE DES PAIEMENTS DE FACTURES QUI ONT ETE ANNULEES.
     *
     * @param string|null date: Date à partir de laquelle chercher
     *
     * @Route("/factures-annulees/{dateFacture}")
     */
    public function getPaiementFacturesAnnulees(CmlFactureRepository $cmlFactureRepository, ?string $dateFacture = null)
    {
        $result = $cmlFactureRepository->getPaiementFacturesAnnulees($dateFacture);

        return $this->json($result);
    }

    /**
     * ARRIERES DES CLIENTS: LISTE DES FACTURES AVEC LE MONTANT DEJA PAYE ET LE RESTE A PAYER DANS UNE AGENCE.
     *
     * @param string codeAgence: Le code de l'agence
     * @param string|null date: Date à partir de laquelle chercher
     *
     * @Route("/arriere-client/agence/{codeAgence}/{dateFacture}")
     */
    public function getArriereClientParFactureAgence(CmlFactureRepository $cmlFactureRepository, string $codeAgence, ?string $dateFacture = null)
    {
        $result = $cmlFactureRepository->getArriereClientParFacture('agence', $codeAgence, $dateFacture);

        return $this->json($result);
    }

    /**
     * ARRIERES DES CLIENTS: LISTE DES FACTURES AVEC LE MONTANT DEJA PAYE ET LE RESTE A PAYER.
     *
     * @param string idClient: L'id du client
     * @param string|null date: Date à partir de laquelle chercher
     *
     * @Route("/arriere-client/{idClient}/{dateFacture}")
     */
    public function getArriereClientParFacture(CmlFactureRepository $cmlFactureRepository, string $idClient, ?string $dateFacture = null)
    {
        $result = $cmlFactureRepository->getArriereClientParFacture('client', $idClient, $dateFacture);

        return $this->json($result);
    }

    /**
     * DECAISSEMENT DANS LES AGENCES SUR UNE PERIODE.
     *
     * @param string dateDebut: Date de debut
     * @param string dateFin: Date de fin
     *
     * @Route("/decaissement/par-nature/{dateDebut}/{dateFin}")
     */
    public function getDecaissementParNatureePeriode(CptOperationCaisseRepository $cptOperationCaisseRepository, string $dateDebut, string $dateFin)
    {
        $result = $cptOperationCaisseRepository->getEncDecParNaturePeriode(8, $dateDebut, $dateFin);

        return $this->json($result);
    }

    /**
     * DECAISSEMENT PAR NATURE DANS UNE AGENCE (exemple DOUALA) SUR UNE PERIODE.
     *
     * @param int agenceId: Id de l'agence
     * @param string dateDebut: Date de debut
     * @param string dateFin: Date de fin
     *
     * @Route("/decaissement/par-nature/agence/{agenceId}/{dateDebut}/{dateFin}")
     */
    public function getDecaissementParNatureAgencePeriode(CptOperationCaisseRepository $cptOperationCaisseRepository, int $agenceId, string $dateDebut, string $dateFin)
    {
        $result = $cptOperationCaisseRepository->getEncDecParNatureAgencePeriode(8, $agenceId, $dateDebut, $dateFin);

        return $this->json($result);
    }

    /**
     * DECAISSEMENT SUR LES IMMEUBLES D'UNE AGENCE (exemple agence_id = 1) SUR UNE PERIODE.
     *
     * @param int agenceId: Id de l'agence
     * @param string dateDebut: Date de debut
     * @param string dateFin: Date de fin
     *
     * @Route("/decaissement/par-immeuble/agence/{agenceId}/{dateDebut}/{dateFin}")
     */
    public function getDecaissementParImmeubleAgencePeriode(CptOperationCaisseRepository $cptOperationCaisseRepository, int $agenceId, string $dateDebut, string $dateFin)
    {
        $result = $cptOperationCaisseRepository->getEncDecParImmeubleAgencePeriode(8, $agenceId, $dateDebut, $dateFin);

        return $this->json($result);
    }

    /**
     * ENCAISSEMENT DANS LES AGENCES SUR UNE PERIODE.
     *
     * @param string dateDebut: Date de debut
     * @param string dateFin: Date de fin
     *
     * @Route("/encaissement/par-nature/{dateDebut}/{dateFin}")
     */
    public function getEncaissementParNatureePeriode(CptOperationCaisseRepository $cptOperationCaisseRepository, string $dateDebut, string $dateFin)
    {
        $result = $cptOperationCaisseRepository->getEncDecParNaturePeriode(7, $dateDebut, $dateFin);

        return $this->json($result);
    }

    /**
     * ENCAISSEMENT PAR NATURE DANS UNE AGENCE (exemple DOUALA) SUR UNE PERIODE.
     *
     * @param int agenceId: Id de l'agence
     * @param string dateDebut: Date de debut
     * @param string dateFin: Date de fin
     *
     * @Route("/encaissement/par-nature/agence/{agenceId}/{dateDebut}/{dateFin}")
     */
    public function getEncaissementParNatureAgencePeriode(CptOperationCaisseRepository $cptOperationCaisseRepository, int $agenceId, string $dateDebut, string $dateFin)
    {
        $result = $cptOperationCaisseRepository->getEncDecParNatureAgencePeriode(7, $agenceId, $dateDebut, $dateFin);

        return $this->json($result);
    }

    /**
     * ENCAISSEMENT SUR LES IMMEUBLES D'UNE AGENCE (exemple agence_id = 1) SUR UNE PERIODE.
     *
     * @param int agenceId: Id de l'agence
     * @param string dateDebut: Date de debut
     * @param string dateFin: Date de fin
     *
     * @Route("/encaissement/par-immeuble/agence/{agenceId}/{dateDebut}/{dateFin}")
     */
    public function getEncaissementParImmeubleAgencePeriode(CptOperationCaisseRepository $cptOperationCaisseRepository, int $agenceId, string $dateDebut, string $dateFin)
    {
        $result = $cptOperationCaisseRepository->getEncDecParImmeubleAgencePeriode(7, $agenceId, $dateDebut, $dateFin);

        return $this->json($result);
    }

    /**
     * ETAT DES DECAISSEMENTS PAR AGENCE (exemple agence_id = 1) SUR UNE ANNEE (exemple 2020) ET REPARTIS PAR MOIS.
     *
     * @param int agenceId: Id de l'agence
     * @param int annee: L'année cherchée
     *
     * @Route("/decaissement/agence/{agenceId}/{annee}")
     */
    public function getEtatDecaissementAgenceParMois(CptOperationCaisseRepository $cptOperationCaisseRepository, int $agenceId, int $annee)
    {
        $result = $cptOperationCaisseRepository->getEncEtatDecAgenceParMois(8, $agenceId, $annee);

        return $this->json($result);
    }

    /**
     * ETAT DES ENCAISSEMENTS PAR AGENCE (exemple agence_id = 1) SUR UNE ANNEE (exemple 2020) ET REPARTIS PAR MOIS.
     *
     * @param int agenceId: Id de l'agence
     * @param int annee: L'année cherchée
     *
     * @Route("/encaissement/agence/{agenceId}/{annee}")
     */
    public function getEtatEncaissementAgenceParMois(CptOperationCaisseRepository $cptOperationCaisseRepository, int $agenceId, int $annee)
    {
        $result = $cptOperationCaisseRepository->getEncEtatDecAgenceParMois(7, $agenceId, $annee);

        return $this->json($result);
    }
}
