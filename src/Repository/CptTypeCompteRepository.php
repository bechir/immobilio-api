<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CptTypeCompte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptTypeCompte|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptTypeCompte|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptTypeCompte[]    findAll()
 * @method CptTypeCompte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptTypeCompteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptTypeCompte::class);
    }

    // /**
    //  * @return CptTypeCompte[] Returns an array of CptTypeCompte objects
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
    public function findOneBySomeField($value): ?CptTypeCompte
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
