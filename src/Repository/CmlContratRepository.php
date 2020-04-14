<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CmlContrat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlContrat|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlContrat|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlContrat[]    findAll()
 * @method CmlContrat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlContratRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlContrat::class);
    }

    // /**
    //  * @return CmlContrat[] Returns an array of CmlContrat objects
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
    public function findOneBySomeField($value): ?CmlContrat
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
