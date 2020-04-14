<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Controller\Api;

use App\Repository\PatBienImmobilierRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class PatrimoineController extends ApiController
{
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
