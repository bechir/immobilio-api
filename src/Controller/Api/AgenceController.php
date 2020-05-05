<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Controller\Api;

use App\Entity\AppAgence;
use App\Repository\AppAgenceRepository;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * @Route("/agences")
 *
 * @IsGranted("ROLE_ADMIN")
 */
class AgenceController extends ApiController
{
    /**
     * Liste des agences enregistrées sur une période (date de début et de fin)
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param string    startDate: Date de début
     * @param string    endDate: date de fin
     *
     * @Route("/list/{startDate}/{endDate}")
     */
    public function getAgences(AppAgenceRepository $agenceRepository, string $startDate = null, string $endDate = null)
    {
        $list = $agenceRepository->getAgences($startDate, $endDate);

        return $this->jsonResponse($list, 'json', SerializationContext::create()->setGroups(['list']));
    }

    /**
     * Details d'une agence.
     *
     * @param int id: L'identifiant de l'agence
     *
     * @Route("/{id}")
     */
    public function getAgenceById(AppAgence $agence)
    {
        return $this->jsonResponse($agence, 'json', SerializationContext::create()->setGroups(['details']));
    }
}
