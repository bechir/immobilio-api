<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CmlClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlClient[]    findAll()
 * @method CmlClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlClient::class);
    }
    public function getClients(string $startDate = null, string $endDate = null)
    {
        return $this->buildPeriodQuery($startDate, $endDate)
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

        return $this->createQueryBuilder('c')
            ->leftJoin('c.typeClient', 't')->addSelect('t')
            ->andWhere('c.createdAt BETWEEN :startDate AND :endDate')
            ->andWhere('t.id = 1')
            ->setParameter('startDate', $start)
            ->setParameter('endDate', $end);
    }
}
