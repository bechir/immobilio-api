<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Controller\Api;

use App\Entity\CmlClient;
use App\Repository\CmlClientRepository;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/clients")
 *
 * @IsGranted("ROLE_ADMIN")
 */
class ClientController extends ApiController
{
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
