<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CptOperationCaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

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

    public function getEtatPaiementsFactureAgenceSci(int $agenceId, int $sciId, string $dateDebut, string $dateFin)
    {
        return $this->getEtat__TYPE__ByAgenceSci($agenceId, $sciId, $dateDebut, $dateFin, 6);
    }

    public function getEtatPaiementFacturesBienImmobilier(int $bienImmobilierId, string $dateDebut, string $dateFin)
    {
        return $this->getEtat__TYPE__BienImmobilier($bienImmobilierId, $dateDebut, $dateFin, 6);
    }

    public function getEtatPaiementFacturesModePaiement($dateDebut, $dateFin)
    {
        return $this->buildPeriodQuery($dateDebut, $dateFin)
            ->leftJoin('o.typeOperationCaisse', 'typeOperation')
                ->addSelect('typeOperation')
            ->leftJoin('o.moyenPaiement', 'm')
                ->addSelect('m')
            ->andWhere('typeOperation.id = 6')
            ->getQuery()->getResult(\PDO::FETCH_ASSOC);
    }

    public function getEtatDepensesAgenceSci(int $agenceId, int $sciId, string $dateDebut, string $dateFin)
    {
        return $this->getEtat__TYPE__ByAgenceSci($agenceId, $sciId, $dateDebut, $dateFin, 8);
    }

    public function getEtatDepensesBienImmobilier(int $bienImmobilierId, string $dateDebut, string $dateFin)
    {
        return $this->getEtat__TYPE__BienImmobilier($bienImmobilierId, $dateDebut, $dateFin, 8);
    }

    public function getEtatDepensesNatureDepense(int $natureId, string $dateDebut, string $dateFin)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.nature', 'n')
                    ->addSelect('n')
                ->leftJoin('o.typeOperationCaisse', 't')
                    ->addSelect('t')
                ->andWhere('n.id = :nature')
                ->andWhere('t.id = 8')
                ->setParameter('nature', $natureId)
        );
    }

    public function getEtatDepensesNatureDepenseAgenceSci(int $natureId, int $agenceId, int $sciId, string $dateDebut, string $dateFin)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.agence', 'a')
                    ->addSelect('a')
                ->leftJoin('o.nature', 'n')
                    ->addSelect('n')
                ->leftJoin('o.sci', 's')
                    ->addSelect('s')
                ->leftJoin('o.typeOperationCaisseId', 't')
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

    public function getPaiementsFactureByDatesAgenceSci($agenceId, $sciId, $startDate, $endDate)
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

    private function getEtat__TYPE__ByAgenceSci(int $agenceId, int $sciId, string $dateDebut, string $dateFin, $type)
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
                ->orWhere('s.id = :sci')
                ->andWhere('t.id = :type')
                ->setParameter('type', $type)
                ->setParameter('agence', $agenceId)
                ->setParameter('sci', $sciId)
        );
    }

    public function getEtat__TYPE__BienImmobilier(int $bienImmobilierId, string $dateDebut, string $dateFin, $type)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->leftJoin('o.bienImmobilier', 'b')
                    ->addSelect('b')
                ->leftJoin('o.typeOperationCaisse', 't')
                    ->addSelect('t')
                ->andWhere('b.id = :bienImmobilierId')
                ->andWhere('t.id = :type')
                ->setParameter('type', $type)
                ->setParameter('bienImmobilierId', $bienImmobilierId)
        );
    }

    public function buildPeriodQuery(string $start, string $end)
    {
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
        return $queryBuilder->getQuery()
            ->getResult(\PDO::FETCH_ASSOC);
    }

    public function getPaiementsFactureByDatesClientSci($clientId, $startDate, $endDate)
    {
        return $this->createQueryBuilder('o')
            ->leftJoin('o.client', 'c')
                ->addSelect('c')
            ->where('c.id = :client')
            ->andWhere('o.dateOperation BETWEEN :startDate AND :endDate')
            ->setParameter('client', $clientId)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery()
            ->getResult();
    }
}
