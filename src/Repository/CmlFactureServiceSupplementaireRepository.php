<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Repository;

use App\Entity\CmlFactureServiceSupplementaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlFactureServiceSupplementaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlFactureServiceSupplementaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlFactureServiceSupplementaire[]    findAll()
 * @method CmlFactureServiceSupplementaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlFactureServiceSupplementaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlFactureServiceSupplementaire::class);
    }

    // /**
    //  * @return CmlFactureServiceSupplementaire[] Returns an array of CmlFactureServiceSupplementaire objects
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
    public function findOneBySomeField($value): ?CmlFactureServiceSupplementaire
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
