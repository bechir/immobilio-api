<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Controller\Api;

use App\Repository\CmlFactureRepository;
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
     * @param string|null clientId:     L'id du client
     * @param string|null agenceCode:   Le code de l'agence
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/arrierees")
     */
    public function getArrieresByClientIdByAgenceCodeByDate(Request $request, CmlFactureRepository $cmlFactureRepository)
    {
        $query = $request->query;
        $params = [
            'clientId'  =>  $query->get('clientId'),
            'agenceCode'  =>  $query->get('agenceCode'),
            'startDate' =>  $query->get('startDate'),
            'endDate'   =>  $query->get('endDate')
        ];

        return $this->json(
            $cmlFactureRepository->getEtatArrieresByClientIdByAgenceCodeByDate($params)
        );
    }

    /**
     * ENCAISSEMENT DANS LES AGENCES SUR UNE PERIODE.
     *
     * @param string|null clientId:     L'id du client
     * @param string|null agenceCode:   Le code de l'agence
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/encaissements")
     */
    public function getEncaissementsByClientIdByAgenceCodeByDate(Request $request, CmlFactureRepository $cmlFactureRepository)
    {
        $query = $request->query;
        $params = [
            'clientId'  =>  $query->get('clientId'),
            'agenceCode'  =>  $query->get('agenceCode'),
            'startDate' =>  $query->get('startDate'),
            'endDate'   =>  $query->get('endDate')
        ];

        return $this->json(
            $cmlFactureRepository->getEtatEncaissementsByClientIdByAgenceCodeByDate($params)
        );
    }

    /**
     * DECAISSEMENT DANS LES AGENCES SUR UNE PERIODE.
     *
     * @param string|null clientId:     L'id du client
     * @param string|null agenceCode:   Le code de l'agence
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/decaissements")
     */
    public function getDecaissementsByClientIdByAgenceCodeByDate(Request $request, CmlFactureRepository $cmlFactureRepository)
    {
        $query = $request->query;
        $params = [
            'clientId'  =>  $query->get('clientId'),
            'agenceCode'  =>  $query->get('agenceCode'),
            'startDate' =>  $query->get('startDate'),
            'endDate'   =>  $query->get('endDate')
        ];

        return $this->json(
            $cmlFactureRepository->getEtatDecaissementsByClientIdByAgenceCodeByDate($params)
        );
    }
}
