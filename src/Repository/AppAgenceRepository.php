<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\AppAgence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AppAgence|null find($id, $lockMode = null, $lockVersion = null)
 * @method AppAgence|null findOneBy(array $criteria, array $orderBy = null)
 * @method AppAgence[]    findAll()
 * @method AppAgence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppAgenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppAgence::class);
    }

    public function getAgences(string $startDate = null, string $endDate = null)
    {
        return $this->buildPeriodQuery($startDate, $endDate)
                ->leftJoin('a.ville', 'v')->addSelect('v')
                ->getQuery()->getResult();
    }

    public function buildPeriodQuery(string $start = null, string $end = null)
    {
        if (!$start) {
            $start = (new \DateTime('-5 years'))->format('Y-m-d');
        }
        if (!$end) {
            $end = (new \DateTime())->format('Y-m-d');
        }

        return $this->createQueryBuilder('a')
            ->andWhere('a.createdAt BETWEEN :startDate AND :endDate')
            ->setParameter('startDate', $start)
            ->setParameter('endDate', $end);
    }
}
