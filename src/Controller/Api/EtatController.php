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
use Symfony\Component\HttpFoundation\Request;

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
     * ARRIERES DES CLIENTS: LISTE DES FACTURES AVEC LE MONTANT DEJA PAYE ET LE RESTE A PAYER.
     *
     * @param string|null clients:      Les identifiants des clients séparés par des virgules
     * @param string|null agences:      Les identifiants des agences séparés par des virgules
     * @param string|null scis:         Les identifiants des scis séparés par des virgules
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/arrieres")
     */
    public function getArrieresByClientsOrAgencesOrScisOrDate(Request $request, CmlFactureRepository $cmlFactureRepository)
    {
        return $this->json(
            $cmlFactureRepository->getEtatArrieresByClientsOrAgencesOrScisOrDate($request->query)
        );
    }

    /**
     * ENCAISSEMENT DANS LES AGENCES SUR UNE PERIODE.
     *
     * @param string|null clients:      Les identifiants des clients séparés par des virgules
     * @param string|null agences:      Les identifiants des agences séparés par des virgules
     * @param string|null scis:         Les identifiants des scis séparés par des virgules
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/encaissements")
     */
    public function getEncaissementsByClientsOrAgencesOrScisOrDate(Request $request, CmlFactureRepository $cmlFactureRepository)
    {
        return $this->json(
            $cmlFactureRepository->getEtatEncaissementsByClientsOrAgencesOrScisOrDate($request->query)
        );
    }

    /**
     * DECAISSEMENT DANS LES AGENCES SUR UNE PERIODE.
     *
     * @param string|null clients:      Les identifiants des clients séparés par des virgules
     * @param string|null agences:      Les identifiants des agences séparés par des virgules
     * @param string|null scis:         Les identifiants des scis séparés par des virgules
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/decaissements")
     */
    public function getDecaissementsByClientsOrAgencesOrScisOrDate(Request $request, CmlFactureRepository $cmlFactureRepository)
    {
        return $this->json(
            $cmlFactureRepository->getEtatDecaissementsByClientsOrAgencesOrScisOrDate($request->query)
        );
    }

    /**
     * SITUATIONS DES CAISSES SUR UNE PERIODE.
     *
     * @param string|null clients:      Les identifiants des clients séparés par des virgules
     * @param string|null agences:      Les identifiants des agences séparés par des virgules
     * @param string|null scis:         Les identifiants des scis séparés par des virgules
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/situations-caisses")
     */
    public function getSituationsCaissesByClientsOrAgencesOrScisOrDate(Request $request, CptOperationCaisseRepository $cptOperationCaisseRepository)
    {
        $query = $request->query;
        $params = [
            'clients'   => $query->get('clients'),
            // 'agences'   => $query->get('agences'),
            'scis'      => $query->get('scis'),
            'startDate' => $query->get('startDate'),
            'endDate'   => $query->get('endDate')
        ];

        return $this->json(
            $cptOperationCaisseRepository->getEtatSituationCaissesByClientsOrAgencesOrScisOrDate($params)
        );
    }
}
