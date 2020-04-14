<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CmlFacture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
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
