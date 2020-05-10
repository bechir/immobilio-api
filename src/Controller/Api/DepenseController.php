<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Controller\Api;

use App\Repository\CptOperationCaisseRepository;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * @Route("/operation-caisse/depense")
 */
class DepenseController extends ApiController
{
    /**
     * Dépenses
     *
     * @param string|null clientId:     L'id du client
     * @param string|null statusId:     L'id du status (payé, non payé, etc.)
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("s")
     */
    public function getDepensesByClientOrStatusOrDate(Request $request, CptOperationCaisseRepository $cptOpCaissseRepository)
    {
        $query = $request->query;
        $params = [
            'clients' => $query->get('clients'),
            'status' => $query->get('facturesStatus'),
            'startDate' => $query->get('startDate'),
            'endDate' => $query->get('endDate'),
        ];

        return $this->json(
            $cptOpCaissseRepository->getAnalyseDepensesByClientOrStatusOrDate($params)
        );
    }

    /**
     * Liste des dépenses réalisées sur une période (date de début et de fin) par une SCI ou Agence.
     * Ceci est fait sur lntité OperationCaisse.
     *
     * @param int       agenceId: Identifiant de l'agence
     * @param int       sciId: Identifiant du SCI
     * @param string    dateDebut: Date de début
     * @param string    dateFin: date de fin
     *
     * @Route("/agence/{agenceId}/sci/{sciId}/{dateDebut}/{dateFin}")
     */
    public function getDepensesByDatesAgenceSc(int $agenceId, $sciId, string $dateDebut, string $dateFin, CptOperationCaisseRepository $cptOpCaissseRepository)
    {
        $this->denyAccessUnlessGranted('view', $this->getUser());
        $list = $cptOpCaissseRepository->getDepensesByDatesAgenceSc($agenceId, $sciId, $dateDebut, $dateFin);

        return $this->jsonResponse($list, 'json', SerializationContext::create()->setGroups(['list']));
    }
}
