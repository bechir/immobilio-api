<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CptTypeOperationCaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptTypeOperationCaisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptTypeOperationCaisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptTypeOperationCaisse[]    findAll()
 * @method CptTypeOperationCaisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptTypeOperationCaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptTypeOperationCaisse::class);
    }

    // /**
    //  * @return CptTypeOperationCaisse[] Returns an array of CptTypeOperationCaisse objects
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
    public function findOneBySomeField($value): ?CptTypeOperationCaisse
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
