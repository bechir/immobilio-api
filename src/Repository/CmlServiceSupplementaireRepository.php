<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CmlServiceSupplementaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlServiceSupplementaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlServiceSupplementaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlServiceSupplementaire[]    findAll()
 * @method CmlServiceSupplementaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlServiceSupplementaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlServiceSupplementaire::class);
    }

    // /**
    //  * @return CmlServiceSupplementaire[] Returns an array of CmlServiceSupplementaire objects
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
    public function findOneBySomeField($value): ?CmlServiceSupplementaire
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
