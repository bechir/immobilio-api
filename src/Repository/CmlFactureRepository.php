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
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\ParameterBag;

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

    public function getFacturesByClientOrStatusOrDate(?array $params)
    {
        return $this->getBaseFactureQueryBuilder()
            ->select('f.reference')
            ->select('')
            ->getQuery()->getResult();
    }

    public function getEtatEncaissementsByClientIdByAgenceCodeByDate(ParameterBag $query)
    {
        $qb = $this->getBaseFactureQueryBuilder()
        ->select('f.reference')
        ->addSelect('SUBSTRING(f.dateFacture, 1, 10) as dateDernierPaiement')
        ->addSelect('c.nom as nomClient')
        ->addSelect('c.personnePrincipalTel1 as contactClient')
        ->addSelect('f.montantTotalNet as montant')
        ->addSelect('opCaisse.numFacturePiece')
        ->addSelect('agence.nom as nomAgence')
        ->addSelect('patSci.libelle as sci')
        ->addSelect('SUM(opCaisse.montant) as totalEncaissements')
        ->addSelect('case when SUM(opCaisse.montant) IS NULL then 0 else SUM(opCaisse.montant) END as montantDernierPaiement')
        ->addSelect('factEspace.loyerMensuel as loyer')
        ->addSelect('factEspace.caution as caution')
        ->addSelect('factEspace.nombreMois as nombreMois')
        ->addSelect('pat.libelle as espaceLoue')

        ->where("statusOperationCaisse.id = 1")
        ->andWhere('typeOpCaisse.id = 8');
        
        return $this->bindEtatFilters($qb, $query);
    }

    public function getEtatArrieresByClientIdByAgenceCodeByDate(ParameterBag $query)
    {
        $qb = $this->getBaseFactureQueryBuilder()
        ->leftJoin('pat.proprietaire', 'propr')->addSelect('propr')
        ->select('f.reference')
        ->addSelect('SUBSTRING(f.dateFacture, 1, 10) as dateDernierPaiement')
        ->addSelect('c.nom as nomClient')
        ->addSelect('c.personnePrincipalTel1 as contactClient')
        ->addSelect('f.montantTotalNet as montant')
        ->addSelect('opCaisse.numFacturePiece')
        ->addSelect('agence.nom as nomAgence')
        ->addSelect('patSci.libelle as sci')
        ->addSelect('f.montantTotalNet - case when SUM(opCaisse.montant) IS NULL then 0 else SUM(opCaisse.montant) END as montantDu')
        ->addSelect('case when SUM(opCaisse.montant) IS NULL then \'-\' else SUM(opCaisse.montant) END as montantDernierPaiement')
        ->addSelect('factEspace.loyerMensuel as loyer')
        ->addSelect('factEspace.caution as caution')
        ->addSelect('factEspace.nombreMois as nombreMois')
        ->addSelect('pat.libelle as espaceLoue')
        ->addSelect('propr.nom as proprietaire')

        ->where("s.code IN ('SF001','SF002')");

        return $this->bindEtatFilters($qb, $query);
    }

    public function getDecaissementsByClientsByAgencesByScisByDate(ParameterBag $query)
    {
        $qb = $this->getBaseFactureQueryBuilder()
        ->select('SUBSTRING(f.dateFacture, 1, 10) as date')
        ->addSelect('opCaisse.beneficiaire as beneficiaire')
        ->addSelect('opCaisse.beneficiaire as contact')
        ->addSelect('f.montantTotalNet as montant')
        ->addSelect('opCaisse.numFacturePiece')
        ->addSelect('agence.nom as nomAgence')
        ->addSelect('patSci.libelle as sci')
        ->addSelect('opCaisse.reference')
        ->addSelect('opCaisse.libelle as motif')
        ->addSelect('opCaisse.numChequeVirement')
        ->addSelect('moyPaiement.libelle as moyenPaiement')
        ->addSelect('opCaisse.banqueCompteBancaire as compteBancaire')

        ->where("statusOperationCaisse.id = 1")
        ->andWhere('typeOpCaisse.id = 8')
        ->andWhere('f.deleted = 0');

        return $this->bindEtatFilters($qb, $query);
    }

    public function bindEtatFilters(QueryBuilder $qb, ParameterBag $query)
    {
        $params = [
            'clients'   => $query->get('clients'),
            'agences'   => $query->get('agences'),
            'scis'      => $query->get('scis'),
            'startDate' => $query->get('startDate'),
            'endDate'   => $query->get('endDate')
        ];

        if(isset($params['clients']) && !empty($params['clients'])) {
            $qb->andWhere($qb->expr()->in('c.id', explode(',', $params['clients'])));
        }

        if(isset($params['agences']) && !empty($params['agences'])) {
            $qb->andWhere($qb->expr()->in('agence.id', explode(',', $params['agences'])));
        }

        if(isset($params['scis']) && !empty($params['scis'])) {
            $qb->andWhere($qb->expr()->in('patSci.id', explode(',', $params['scis'])));
        }

        if(isset($params['statusId']) && !empty($params['statusId'])) {
            $qb->andWhere('statusOperationCaisse.id = :statusId')->setParameter('statusId', $params['statusId']);
        }

        if(isset($params['startDate']) && !empty($params['startDate'])) {
            $qb->andWhere('f.dateFacture > :startDate')->setParameter('startDate', $params['startDate']);
        }

        if(isset($params['endDate']) && !empty($params['endDate'])) {
            $qb->andWhere('f.dateFacture < :endDate')->setParameter('endDate', $params['endDate']);
        }

        return $qb->groupBy('c.id')->getQuery()->getResult();
    }

    public function getBaseFactureQueryBuilder()
    {
        return $this->createQueryBuilder('f')
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
            ->leftJoin('opCaisse.typeOperationCaisse', 'typeOpCaisse')->addSelect('typeOpCaisse')
            ->leftJoin('opCaisse.moyenPaiement', 'moyPaiement')->addSelect('moyPaiement')

            ->andWhere('f.deleted = 0');
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
