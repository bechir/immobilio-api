<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Controller\Api;

use App\Entity\CmlClient;
use App\Repository\CmlClientRepository;
use App\Repository\CmlContratRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/clients")
 *
 * @IsGranted("ROLE_ADMIN")
 */
class ClientController extends ApiController
{
    /**
     * Contrats.
     *
     * @param string|null clientId:     L'id du client
     * @param string|null statusId:     L'id du status (payé, non payé, etc.)
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/contrats")
     */
    public function getAnalyseContratsByClientsOrDate(Request $request, CmlContratRepository $cmlContratRepository)
    {
        return $this->json(
            $cmlContratRepository->getAnalyseContratsByClientsOrDate($this->getParams($request))
        );
    }

    /**
     * Clients.
     *
     * @param string|null clientId:     L'id du client
     * @param string|null statusId:     L'id du status (payé, non payé, etc.)
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/analyse")
     */
    public function getAnalyseClientsByClientsOrDate(Request $request, CmlClientRepository $cmlClientRepository)
    {
        return $this->json(
            $cmlClientRepository->getAnalyseClientsByClientsOrDate($this->getParams($request))
        );
    }

    public function getParams(Request $request)
    {
        $query = $request->query;

        return [
            'clients' => $query->get('clients'),
            'status' => $query->get('facturesStatus'),
            'startDate' => $query->get('startDate'),
            'endDate' => $query->get('endDate'),
        ];
    }

    /**
     * Liste des clients enregistrées sur une période (date de début et de fin)
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param string    startDate: Date de début
     * @param string    endDate: date de fin
     *
     * @Route("/list/{startDate}/{endDate}")
     */
    public function getClients(CmlClientRepository $clientRepository, string $startDate = null, string $endDate = null)
    {
        $list = $clientRepository->getClients($startDate, $endDate);

        return $this->json($list);
    }

    /**
     * Details d'une client.
     *
     * @param int id: L'identifiant de l'client
     *
     * @Route("/{id}")
     */
    public function getClientById(CmlClient $client)
    {
        return $this->json($client);
    }
}
