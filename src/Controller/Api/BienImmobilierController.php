<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Controller\Api;

use App\Repository\PatBienImmobilierRepository;
use App\Repository\PatEspaceRepository;
use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class BienImmobilierController extends ApiController
{
    /**
     * @var PatEspaceRepository
     */
    private $patEspaceRepository;

    /**
     * Constructor.
     *
     * @var PatEspaceRepository
     */
    public function __construct(PatEspaceRepository $patEspaceRepository)
    {
        $this->patEspaceRepository = $patEspaceRepository;
    }

    /**
     * taux d'occupation des immeubles par Agence ou par SCI.
     * Il permet de regrouper les immeubles d'une SCI et calculer le taux d'occupation par SCI.
     * Les sommes seront aggrégées par mois.
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int            codeAgence: Le code de l'agence
     * @param string|null    dateDebut: Date de début
     * @param string|null    dateFin: date de fin
     *
     * @Route("/bien-immobilier/etat/taux-occupation/agence/{codeAgence}/{dateDebut}/{dateFin}")
     */
    public function getTauxOccupationByAgence(string $codeAgence, string $dateDebut = null, string $dateFin = null)
    {
        $espaces = $this->patEspaceRepository->getTauxOccupationByAgence($codeAgence, $dateDebut, $dateFin);

        return $this->json($espaces);
    }

    /**
     * taux d'occupation des espaces par Agence, regroupés par nature.
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int            codeAgence: Le code de l'agence
     * @param string|null    dateDebut: Date de début
     * @param string|null    dateFin: date de fin
     *
     * @Route("/bien-immobilier/etat/taux-occupation/par-nature/agence/{codeAgence}/{dateDebut}/{dateFin}")
     */
    public function getTauxOccupationByAgenceByNatureEspace(string $codeAgence, string $dateDebut = null, string $dateFin = null)
    {
        $espaces = $this->patEspaceRepository->getTauxOccupationByAgenceByNatureEspace($codeAgence, $dateDebut, $dateFin);

        array_multisort($espaces, SORT_NUMERIC);

        return $this->json($espaces);
    }

    /**
     * Taux d'occupation des immeubles d'une SCI
     * Retourne les résultats des 12 derniers mois si les dates sont nulles.
     *
     * @param int            sciId: Identifiant du Sci
     * @param string|null    dateDebut: Date de début
     * @param string|null    dateFin: date de fin
     *
     * @Route("/bien-immobilier/etat/taux-occupation/sci/{sciId}/{dateDebut}/{dateFin}")
     */
    public function getTauxOccupationBySci(int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        if (!$dateDebut) {
            $dateDebut = (new DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$dateFin) {
            $dateFin = (new DateTime())->format('Y-m-d');
        }

        $operations = $this->patEspaceRepository->getTauxOccupationBySci($sciId, $dateDebut, $dateFin);

        return $this->json($operations);
    }

    /**
     * Liste des biens immobiliers par Agence, par SCI.
     *
     * @param string    agenceId:  Identifiant de l'agence
     * @param string    sciId:     Identifiant du Sci
     *
     * @Route("/bien-immobilier/{agenceId}/{sciId}", name="api_bien_by_sci")
     */
    public function getBienImmobiliersBySci(string $agenceId, int $sciId, PatBienImmobilierRepository $patBIRepositorr)
    {
        $list = $patBIRepositorr->findBy(['codeAgence' => $agenceId, 'sci' => $sciId]);
        // $data = $this->jmsSerializer->serialize($list);

        return $this->jsonResponse($list);
    }

    /**
     * Liste des espaces locatifs par immeuble.
     *
     * @param string immeubleId : Identifiant de l'immeuble
     *
     * @Route("/espace-locatif/immeuble/{immeubleId}", name="api_espaces_locatifs_by_immeuble")
     */
    public function getEspaceLocatifsByImmeuble($immeubleId)
    {
        return $this->respond('// TODO');
    }
}
