<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Repository;

use App\Entity\AppRegion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AppRegion|null find($id, $lockMode = null, $lockVersion = null)
 * @method AppRegion|null findOneBy(array $criteria, array $orderBy = null)
 * @method AppRegion[]    findAll()
 * @method AppRegion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppRegionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppRegion::class);
    }

    // /**
    //  * @return AppRegion[] Returns an array of AppRegion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AppRegion
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
