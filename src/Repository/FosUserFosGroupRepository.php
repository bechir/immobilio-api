<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Repository;

use App\Entity\FosUserFosGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FosUserFosGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method FosUserFosGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method FosUserFosGroup[]    findAll()
 * @method FosUserFosGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FosUserFosGroupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FosUserFosGroup::class);
    }

    // /**
    //  * @return FosUserFosGroup[] Returns an array of FosUserFosGroup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FosUserFosGroup
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
