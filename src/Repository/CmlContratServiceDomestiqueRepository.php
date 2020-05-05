<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CmlContratServiceDomestique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlContratServiceDomestique|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlContratServiceDomestique|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlContratServiceDomestique[]    findAll()
 * @method CmlContratServiceDomestique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlContratServiceDomestiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlContratServiceDomestique::class);
    }

    // /**
    //  * @return CmlContratServiceDomestique[] Returns an array of CmlContratServiceDomestique objects
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
    public function findOneBySomeField($value): ?CmlContratServiceDomestique
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
