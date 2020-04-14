<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CmlServiceDomestique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlServiceDomestique|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlServiceDomestique|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlServiceDomestique[]    findAll()
 * @method CmlServiceDomestique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlServiceDomestiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlServiceDomestique::class);
    }

    // /**
    //  * @return CmlServiceDomestique[] Returns an array of CmlServiceDomestique objects
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
    public function findOneBySomeField($value): ?CmlServiceDomestique
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
