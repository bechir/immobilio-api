<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\AppAgence;
use App\Entity\CmlClient;
use App\Entity\CmlFacture;
use App\Entity\CmlFactureEspace;
use App\Entity\CmlTypeClient;
use App\Entity\CptOperationCaisse;
use App\Entity\PatBienImmobilier;
use App\Entity\PatEspace;
use App\Entity\PatSci;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;
use PDO;

/**
 * @method CptOperationCaisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptOperationCaisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptOperationCaisse[]    findAll()
 * @method CptOperationCaisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptOperationCaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptOperationCaisse::class);
    }

    public function getEtatPaiementsFactureAgenceSci(int $agenceId, int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        return $this->getEtat__TYPE__ByAgenceSci($agenceId, $sciId, $dateDebut, $dateFin, 6);
    }

    public function getEtatPaiementsFactureAgence(int $agenceId, string $dateDebut = null, string $dateFin = null)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.agence', 'a')
                    ->addSelect('a')
                ->leftJoin('o.sci', 's')
                    ->addSelect('s')
                ->leftJoin('o.typeOperationCaisse', 't')
                    ->addSelect('t')
                ->andWhere('a.id = :agence')
                ->andWhere('t.id = 6')
                ->setParameter('agence', $agenceId)
        );
    }

    public function getEtatPaiementsFactureSci(int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.typeOperationCaisse', 't')
                    ->addSelect('t')
                ->leftJoin(PatSci::class, 'pat', Join::WITH, 'pat.codeAgence = o.codeAgence')
                ->andWhere('t.id = 6')
                ->andWhere('pat.id = :sci')
                ->setParameter('sci', $sciId)
        );
    }

    public function getEtatPaiementFacturesBienImmobilier(int $bienImmobilierId, string $dateDebut = null, string $dateFin = null)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.typeOperationCaisse', 't')
                    ->addSelect('t')
                ->leftJoin(CmlFacture::class, 'f', Join::WITH, 'f.reference = o.numFacturePiece')
                ->leftJoin(CmlFactureEspace::class, 'espace', Join::WITH, 'espace.facture = f.id')
                ->leftJoin(PatEspace::class, 'pat', Join::WITH, 'pat.id = espace.espace')
                ->leftJoin(PatBienImmobilier::class, 'bien', Join::WITH, 'bien.id = pat.bienImmobilier')
                ->andWhere('t.id = 6')
                ->andWhere('bien.id = :id')
                ->setParameter('id', $bienImmobilierId)
                ->andWhere('o.dateOperation BETWEEN :start AND :end')
                ->setParameter('start', $dateDebut)
                ->setParameter('end', $dateFin)
        );
    }

    public function getEtatPaiementFacturesModePaiement($dateDebut, $dateFin)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.typeOperationCaisse', 'typeOperation')
                    ->addSelect('typeOperation')
                ->leftJoin('o.moyenPaiement', 'm')
                    ->addSelect('m')
                ->andWhere('typeOperation.id = 6')
        );
    }

    public function getEtatDepensesAgence(int $agenceId, string $dateDebut = null, string $dateFin = null, $assoc = true)
    {
        $qb = $this->buildPeriodQuery($dateDebut, $dateFin)
            ->leftJoin('o.agence', 'a')
                ->addSelect('a')
            ->leftJoin('o.typeOperationCaisse', 't')
                ->addSelect('t')
            ->andWhere('a.id = :agence')
            ->andWhere('t.id = 8')
            ->setParameter('agence', $agenceId);

        return $assoc ? $this->getAssocResults($qb) : $qb->getQuery()->getResult();
    }

    public function getEtatDepensesSci(int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.typeOperationCaisse', 't')
                    ->addSelect('t')
                ->leftJoin(PatSci::class, 'pat', Join::WITH, 'pat.codeAgence = o.codeAgence')
                ->andWhere('t.id = 8')
                ->andWhere('pat.id = :sci')
                ->setParameter('sci', $sciId)
        );
    }

    public function getEtatDepensesBienImmobilier(int $bienImmobilierId, string $dateDebut = null, string $dateFin = null)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.bienImmobilier', 'b')
                    ->addSelect('b')
                ->leftJoin('o.typeOperationCaisse', 't')
                    ->addSelect('t')
                ->andWhere('b.id = :bienImmobilierId')
                ->andWhere('t.id = 8')
                ->setParameter('bienImmobilierId', $bienImmobilierId)
        );
    }

    public function getEtatDepensesPourUneNatureDepense(string $natureId, string $dateDebut = null, string $dateFin = null)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.typeOperationCaisse', 't')->addSelect('t')
                ->leftJoin('o.centreDepense', 'c')->addSelect('c')
                ->select('SUBSTRING(o.dateOperation, 1, 7) as datetime')
                ->addSelect('SUM(o.montant) as total')
                ->andWhere('c.code = :code')
                ->andWhere('t.id = 8')
                ->groupBy('o.dateOperation')
                ->setParameter('code', $natureId)
        );
    }

    public function getEtatDepensesParNatureDepense($agenceId = null, string $dateDebut = null, string $dateFin = null)
    {
        $qb =  $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.centreDepense', 'c')->addSelect('c')
                ->leftJoin('o.typeOperationCaisse', 't')->addSelect('t')
                ->andWhere('t.id = 8');
        if($agenceId != null) {
            $qb->leftJoin('o.agence', 'a')
                ->addSelect('a')
            ->andWhere('a.id = :id')
            ->setParameter('id', $agenceId);
        }

        $qb->select('SUBSTRING(o.dateOperation, 1, 7) as datetime')
            ->addSelect('SUM(o.montant) as total')
            ->addSelect('c.libelle as label')
            ->addSelect('c.code')
            ->groupBy('o.dateOperation');

        return $this->getAssocResults($qb);
    }

    public function getEtatDepensesNatureDepenseAgenceSci(int $natureId, int $agenceId, int $sciId, string $dateDebut = null, string $dateFin = null)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.agence', 'a')
                    ->addSelect('a')
                ->leftJoin('o.nature', 'n')
                    ->addSelect('n')
                ->leftJoin('o.sci', 's')
                    ->addSelect('s')
                ->leftJoin('o.typeOperationCaisse', 't')
                    ->addSelect('t')
                ->andWhere('a.id = :agence')
                ->orWhere('s.id = :sci')
                ->andWhere('n.id = :nature')
                ->andWhere('t.id = 8')
                ->setParameter('nature', $natureId)
                ->setParameter('agence', $agenceId)
                ->setParameter('sci', $sciId)
        );
    }

    public function getPaiementsFactureByDatesAgenceSci($agenceId, $sciId, $startDate = null, $endDate = null)
    {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.agence', 'a')
                ->addSelect('a')
            ->leftJoin('o.sci', 's')
                ->addSelect('s')
            ->where('a.id = :agence')
            ->orWhere('sci.id = :sci')
            ->andWhere('o.dateOperation BETWEEN :startDate AND :endDate')
            ->setParameter('agence', $agenceId)
            ->setParameter('sci', $sciId)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery()
            ->getResult();
    }

    public function getEncaissementParAgence(string $dateDebut = null, string $dateFin = null)
    {
        return $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.typeOperationCaisse', 't')
                    ->addSelect('t')
                ->leftJoin(AppAgence::class, 'a', Join::WITH, 'a.code = o.codeAgence')
                ->groupBy('o.codeAgence')
                ->select('a.nom as name')
                ->addSelect('SUM(o.montant) as total')
                ->andWhere('t.id = 7')
                ->getQuery()->getResult()
        ;
    }

    public function getEncaissementParTypeClient(string $dateDebut = null, string $dateFin = null)
    {
        return $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.typeOperationCaisse', 't')->addSelect('t')
                ->leftJoin('o.client', 'c')->addSelect('c')
                ->leftJoin(CmlTypeClient::class, 'typeClient', Join::WITH, 'typeClient.id = c.typeClient')
                ->select('typeClient.libelle as label')
                ->addSelect('SUM(o.montant) as total')
                ->andWhere('t.id IN (6, 7)')
                ->groupBy('typeClient')
                ->getQuery()->getResult(PDO::FETCH_ASSOC)
        ;
    }

    public function getOperationsByType(string $startDate = null, string $endDate = null)
    {
        return $this->buildPeriodQuery($startDate, $endDate)
            ->leftJoin('o.typeOperationCaisse', 't')->addSelect('t')
            ->select('SUBSTRING(o.dateOperation, 1, 7) as month')
            ->addSelect('SUM(o.montant) as value')
            ->addSelect('t.code')
            ->addSelect('t.label')
            ->groupBy('month')
            ->addGroupBy('o.typeOperationCaisse')
            ->getQuery()->getResult();
    }


    public function buildPeriodQuery(string $start = null, string $end = null)
    {
        if (!$start) {
            $start = (new \DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$end) {
            $end = (new \DateTime())->format('Y-m-d');
        }

        return $this->createQueryBuilder('o')
            ->leftJoin('o.statusOperation', 'status')
                ->addSelect('status')
            ->andWhere('o.dateOperation BETWEEN :startDate AND :endDate')
            ->andWhere('o.operationAnnule is NULL')
            ->andWhere('status.id = 1')
            ->setParameter('startDate', $start)
            ->setParameter('endDate', $end);
    }

    public function getAssocResults(QueryBuilder $queryBuilder)
    {
        return $queryBuilder->getQuery()->getResult(\PDO::FETCH_ASSOC);
    }
}
