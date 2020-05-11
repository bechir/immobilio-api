<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Controller\Api;

use App\Repository\CmlContratRepository;
use App\Repository\PatBienImmobilierRepository;
use App\Repository\PatProprietaireRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/patrimoine")
 *
 * @IsGranted("ROLE_ADMIN")
 */
class PatrimoineController extends ApiController
{
    /**
     * Biens immobiliers
     *
     * @param string|null clientId:     L'id du client
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/biens-immobiliers")
     */
    public function getPatrimoineBiensByClientsOrAgencesOrScisOrDate(Request $request, PatBienImmobilierRepository $patBienImmobilierRepository)
    {
        return $this->json(
            $patBienImmobilierRepository->getPatrimoineBiensByClientsOrAgencesOrScisOrDate($this->getParams($request))
        );
    }

    /**
     * Proprietaire
     *
     * @param string|null clientId:     L'id du client
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/proprietaires")
     */
    public function getPatrimoineProprietairesByClientsOrAgencesOrScisOrDate(Request $request, PatProprietaireRepository $patProprietaireRepository)
    {
        return $this->json(
            $patProprietaireRepository->getPatrimoineProprietairesByClientsOrAgencesOrScisOrDate($this->getParams($request))
        );
    }

    public function getParams(Request $request)
    {
        $query = $request->query;
        return [
            'clients' => $query->get('clients'),
            'startDate' => $query->get('startDate'),
            'endDate' => $query->get('endDate'),
        ];
    }
}
