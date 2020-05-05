<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CmlContratEspace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlContratEspace|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlContratEspace|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlContratEspace[]    findAll()
 * @method CmlContratEspace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlContratEspaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlContratEspace::class);
    }

    // /**
    //  * @return CmlContratEspace[] Returns an array of CmlContratEspace objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CmlContratEspace
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
