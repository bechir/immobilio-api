<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\AppAgence;
use App\Entity\CmlFacture;
use App\Entity\CmlFactureEspace;
use App\Entity\CptOperationCaisse;
use App\Entity\PatBienImmobilier;
use App\Entity\PatEspace;
use App\Entity\PatSci;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlFacture|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlFacture|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlFacture[]    findAll()
 * @method CmlFacture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlFactureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlFacture::class);
    }

    public function getPaiementFacturesAnnulees(?string $date)
    {
        return $this->getBaseFactureQueryBuilder($date)
            ->andWhere('statusOperationCaisse.id = 2')
            ->getQuery()->getResult();
    }

    public function getArriereClientParFacture(string $type, string $id, ?string $date)
    {
        if (!$date) {
            $date = date('Y-m-d');
        }

        $qb = $this->getBaseFactureQueryBuilder($date);

        if ('client' === $type) {
            $qb->andWhere('c.id = :id')
            ->setParameter('id', $id);
        } elseif ('agence' === $type) {
            $qb->andWhere('f.codeAgence = :code')
            ->setParameter('code', $id);
        }

        return $qb->getQuery()->getResult();
    }

    public function getBaseFactureQueryBuilder(?string $date)
    {
        if (!$date) {
            $date = date('Y-m-d');
        }

        return $this->createQueryBuilder('f')
            ->leftJoin('f.client', 'c')->addSelect('c')
            ->leftJoin('f.status', 's')->addSelect('s')

            ->leftJoin(AppAgence::class, 'agence', Join::WITH, 'agence.code = f.codeAgence')
            ->leftJoin(CmlFactureEspace::class, 'factEspace', Join::WITH, 'factEspace.facture = f')
            ->leftJoin(CptOperationCaisse::class, 'opCaisse', Join::WITH, 'f.reference = opCaisse.numFacturePiece')
            ->leftJoin('opCaisse.statusOperation', 'statusOperationCaisse')->addSelect('statusOperationCaisse')

            ->select('c.id as id_client')
            ->addSelect('c.emailClient email_client')
            ->addSelect('c.telClient tel_client')
            ->addSelect('c.raisonSociale raison_sociale')
            ->addSelect('f.reference as reference')
            ->addSelect('f.montantTotalNet as montant_total_net')
            ->addSelect('SUBSTRING(f.dateFacture, 1, 10) as date_facture')
            ->addSelect('SUBSTRING(f.dateLimite, 1, 10) as date_limite')
            ->addSelect('s.libelle as libelle_status')
            ->addSelect('agence.nom as nom_agence')
            ->addSelect('SUM(opCaisse.montant) as montant_deja_paye')
            ->addSelect('f.montantTotalNet - SUM(opCaisse.montant) as montant_restant')
            ->addSelect('factEspace.nombreMois as nombre_mois_facture')

            ->where("s.code IN ('SF001','SF002')")
            ->andWhere('f.deleted = 0')
            ->andWhere('f.dateFacture < :dateFacture')
            ->setParameter('dateFacture', $date)

            ->groupBy('reference')
            ->addGroupBy('montant_total_net')
            ->addGroupBy('date_facture')
            ->addGroupBy('date_limite')
            ->addGroupBy('nom_agence')
            ->addGroupBy('libelle_status')
            ->addGroupBy('nombre_mois_facture')
            ->addGroupBy('id_client')
            ->addGroupBy('raison_sociale')
            ->addGroupBy('tel_client')
            ->addGroupBy('email_client');
    }

    public function getArrieresByClientIdByAgenceCodeByDate(?array $params)
    {
        $qb = $this->createQueryBuilder('f')
        ->leftJoin('f.client', 'c')->addSelect('c')
        ->leftJoin('f.status', 's')->addSelect('s')
        ->leftJoin(AppAgence::class, 'agence', Join::WITH, 'agence.code = f.codeAgence')
        ->leftJoin(CmlFactureEspace::class, 'factEspace', Join::WITH, 'factEspace.facture = f')
        ->leftJoin(CptOperationCaisse::class, 'opCaisse', Join::WITH, 'f.reference = opCaisse.numFacturePiece')
        ->leftJoin(CmlFactureEspace::class, 'espace', Join::WITH, 'espace.facture = f.id')
        ->leftJoin(PatEspace::class, 'pat', Join::WITH, 'pat.id = espace.espace')
        ->leftJoin(PatBienImmobilier::class, 'bien', Join::WITH, 'bien.id = pat.bienImmobilier')
        ->leftJoin('bien.sci', 'patSci')->addSelect('patSci')
        ->leftJoin('opCaisse.statusOperation', 'statusOperationCaisse')->addSelect('statusOperationCaisse')

        ->select('SUBSTRING(f.dateFacture, 1, 10) as date')
        ->addSelect('opCaisse.beneficiaire as beneficiaire')
        ->addSelect('opCaisse.beneficiaire as contact')
        ->addSelect('f.montantTotalNet as montant')
        ->addSelect('opCaisse.numFacturePiece')
        ->addSelect('agence.nom as nomAgence')
        ->addSelect('patSci.libelle as sci')

        // ->addSelect('SUM(opCaisse.montant) as montant_deja_paye')
        // ->addSelect('f.montantTotalNet - SUM(opCaisse.montant) as montant_restant')
        // ->addSelect('factEspace.nombreMois as nombre_mois_facture')

        ->where("s.code IN ('SF001','SF002')")
        ->andWhere('f.deleted = 0');

        if($params['clientId']) {
            $qb->andWhere('c.id = :client')->setParameter('client', $params['clientId']);
        }

        if($params['agenceCode']) {
            $qb->andWhere('f.codeAgence = :agence')->setParameter('agence', $params['agenceCode']);
        }

        if($params['startDate']) {
            $qb->andWhere('f.dateFacture > :startDate')->setParameter('startDate', $params['startDate']);
        }

        if($params['endDate']) {
            $qb->andWhere('f.dateFacture < :endDate')->setParameter('endDate', $params['endDate']);
        }

        return $qb->groupBy('c.id')->getQuery()->getResult();
    }

    public function getFacturesByClient($clientId, $startDate, $endDate)
    {
        return $this->createQueryBuilder('f')
            ->where('f.client = :client')
            ->andWhere('f.dateFacture BETWEEN :startDate AND :endDate')
            ->setParameter('client', $clientId)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery()
            ->getResult();
    }

    public function getFacturesByClientStatus($clientId, $startDate, $endDate, $statusCode)
    {
        return $this->createQueryBuilder('f')
            ->leftJoin('f.status', 's')
                ->addSelect('s')
            ->where('f.client = :client')
            ->andWhere('f.dateFacture BETWEEN :startDate AND :endDate')
            ->andWhere('s.code = :status')
            ->setParameter('status', $statusCode)
            ->setParameter('client', $clientId)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery()
            ->getResult();
    }
}
