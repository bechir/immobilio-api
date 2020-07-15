<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Repository;

use App\Entity\CmlContratServiceSupplementaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlContratServiceSupplementaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlContratServiceSupplementaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlContratServiceSupplementaire[]    findAll()
 * @method CmlContratServiceSupplementaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlContratServiceSupplementaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlContratServiceSupplementaire::class);
    }

    // /**
    //  * @return CmlContratServiceSupplementaire[] Returns an array of CmlContratServiceSupplementaire objects
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
    public function findOneBySomeField($value): ?CmlContratServiceSupplementaire
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
