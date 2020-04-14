<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\AppOptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AppOptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method AppOptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method AppOptions[]    findAll()
 * @method AppOptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppOptionsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppOptions::class);
    }

    // /**
    //  * @return AppOptions[] Returns an array of AppOptions objects
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
    public function findOneBySomeField($value): ?AppOptions
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
