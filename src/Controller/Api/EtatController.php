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
     * @param string|null clients:      Les identifiants des clients séparés par des virgules
     * @param string|null agences:      Les identifiants des agences séparés par des virgules
     * @param string|null scis:         Les identifiants des scis séparés par des virgules
     * @param string|null startDate:    Date de début
     * @param string|null endDate:      Date de fin
     *
     * @Route("/arrieres")
     */
    public function getArrieresByClientIdByAgenceCodeByDate(Request $request, CmlFactureRepository $cmlFactureRepository)
    {
        return $this->json(
            $cmlFactureRepository->getEtatArrieresByClientIdByAgenceCodeByDate($request->query)
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
    public function getEncaissementsByClientIdByAgenceCodeByDate(Request $request, CmlFactureRepository $cmlFactureRepository)
    {
        return $this->json(
            $cmlFactureRepository->getEtatEncaissementsByClientIdByAgenceCodeByDate($request->query)
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
    public function getDecaissementsByClientsByAgencesByScisByDate(Request $request, CmlFactureRepository $cmlFactureRepository)
    {
        return $this->json(
            $cmlFactureRepository->getDecaissementsByClientsByAgencesByScisByDate($request->query)
        );
    }
}
