<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CptSousCentreDepense;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptSousCentreDepense|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptSousCentreDepense|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptSousCentreDepense[]    findAll()
 * @method CptSousCentreDepense[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptSousCentreDepenseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptSousCentreDepense::class);
    }

    // /**
    //  * @return CptSousCentreDepense[] Returns an array of CptSousCentreDepense objects
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
    public function findOneBySomeField($value): ?CptSousCentreDepense
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
