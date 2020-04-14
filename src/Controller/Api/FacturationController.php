<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Controller\Api;

use App\Entity\CmlFacture;
use App\Entity\CptOperationCaisse;
use App\Repository\CmlFactureEspaceRepository;
use App\Repository\CmlFactureRepository;
use App\Repository\CptOperationCaisseRepository;
use JMS\Serializer\SerializationContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class FacturationController extends ApiController
{
    /**
     * Liste des factures émises sur une période (date de début et de fin) à un client.
     *
     * @param int       clientId: Identifiant du client
     * @param string    dateDebut: Date de début
     * @param string    dateFin: date de fin
     *
     * @Route("/factures/client/{clientId}/{dateDebut}/{dateFin}", name="api_factures_by_client")
     */
    public function getFacturesByClient(string $clientId, string $dateDebut, string $dateFin, CmlFactureRepository $factureRepository)
    {
        $this->denyAccessUnlessGranted('view', $this->getUser());
        $list = $factureRepository->getFacturesByClient($clientId, $dateDebut, $dateFin);

        return $this->jsonResponse($list, 'json', SerializationContext::create()->setGroups(['list']));
    }

    /**
     * Liste des factures émises sur une période (date de début et de fin) à un
     * client par statut (non payées, payées en partie, payées).
     *
     * @param int       clientId:   Identifiant du client
     * @param string    statusCode: Code du status
     * @param string    dateDebut:  Date de début
     * @param string    dateFin:    date de fin
     *
     * @Route("/factures/client/{clientId}/{statusCode}/{dateDebut}/{dateFin}", name="api_factures_by_client_status")
     */
    public function getFacturesByClientStatus(string $clientId, string $statusCode, string $dateDebut, string $dateFin, CmlFactureRepository $factureRepository)
    {
        $this->denyAccessUnlessGranted('view', $this->getUser());
        $list = $factureRepository->getFacturesByClientStatus($clientId, $dateDebut, $dateFin, $statusCode);

        return $this->jsonResponse($list, 'json', SerializationContext::create()->setGroups(['list']));
    }

    /**
     * Liste des paiements de factures réalisés sur une période dans un SCI ou une Agence.
     * Ceci est fait sur l'entité OperationCaisse.
     *
     * @param int       agenceId:   Identifiant de l'agence
     * @param string    sciId:      Identifiant du SCI
     * @param string    dateDebut:  Date de début
     * @param string    dateFin:    date de fin
     *
     * @Route("/paiement-facture/agence/{agenceId}/sci/{sciId}/{dateDebut}/{dateFin}", name="api_paiements_facture_by_dates_agence_sci")
     */
    public function getPaiementsFactureByDatesAgenceSci(int $agenceId, $sciId, string $dateDebut, string $dateFin, CptOperationCaisseRepository $cptOpCaissseRepository)
    {
        $this->denyAccessUnlessGranted('view', $this->getUser());
        $list = $cptOpCaissseRepository->getPaiementsFactureByDatesAgenceSci($agenceId, $sciId, $dateDebut, $dateFin);

        return $this->jsonResponse($list);
    }

    /**
     * Liste des paiements de factures réalisés sur une période par un client.
     * Ceci est fait sur lntité OperationCaisse.
     *
     * @param int       clientId:   Identifiant du client
     * @param string    dateDebut:  Date de début
     * @param string    dateFin:    date de fin
     *
     * @Route("/paiement-facture/client/{clientId}/{dateDebut}/{dateFin}", name="api_paiements_facture_by_dates_client_sci")
     */
    public function getPaiementsFactureByClient(int $clientId, $dateDebut, string $dateFin, CptOperationCaisseRepository $cptOpCaissseRepository)
    {
        $this->denyAccessUnlessGranted('view', $this->getUser());
        $list = $cptOpCaissseRepository->getPaiementsFactureByDatesClientSci($clientId, $dateDebut, $dateFin);

        return $this->jsonResponse($list);
    }

    /**
     * Informations détaillées sur une facture (Client, espaces loués, montant).
     *
     * @param int factureId: Identifiant de la facture
     *
     * @Route("/facture/{id}", name="api_facture_by_id")
     */
    public function getFacture(CmlFacture $facture, CmlFactureEspaceRepository $factureEspaceRepository)
    {
        $this->denyAccessUnlessGranted('view', $this->getUser());
        $cmlEspace = $factureEspaceRepository->findOneBy(['facture' => $facture]);
        $patEspace = $cmlEspace->getEspace();

        $cmlEspaceData = $this->jmsSerializer->serialize($cmlEspace, 'json');
        $data = $this->jmsSerializer->serialize($facture, 'json', SerializationContext::create()->setGroups(['details']));
        $data = json_decode($data, true);
        $cmlEspaceData = json_decode($cmlEspaceData, true);
        $cmlEspaceData['patEspace'] = json_decode($this->jmsSerializer->serialize($patEspace, 'json'));
        $data['espace'] = $cmlEspaceData;

        return $this->json($data);
    }

    /**
     * Infos détaillées sur un paiement (nom du client, numéro de facture, montant encaissé, reste à payer ...).
     *
     * @param int operationId : Identificant du paiement
     *
     * @Route("/paiement-facture/{id}", name="api_facture_by_id")
     */
    public function getPaiementsFacture(CptOperationCaisse $operation)
    {
        $this->denyAccessUnlessGranted('view', $this->getUser());

        return $this->jsonResponse($operation);
    }
}
