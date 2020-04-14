<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CmlStatusFacture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlStatusFacture|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlStatusFacture|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlStatusFacture[]    findAll()
 * @method CmlStatusFacture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlStatusFactureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlStatusFacture::class);
    }

    // /**
    //  * @return CmlStatusFacture[] Returns an array of CmlStatusFacture objects
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
    public function findOneBySomeField($value): ?CmlStatusFacture
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
