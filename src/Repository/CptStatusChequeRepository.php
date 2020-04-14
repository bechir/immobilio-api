<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CptStatusCheque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptStatusCheque|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptStatusCheque|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptStatusCheque[]    findAll()
 * @method CptStatusCheque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptStatusChequeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptStatusCheque::class);
    }

    // /**
    //  * @return CptStatusCheque[] Returns an array of CptStatusCheque objects
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
    public function findOneBySomeField($value): ?CptStatusCheque
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
