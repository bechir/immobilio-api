<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Repository;

use App\Entity\CptStatusOperationCaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptStatusOperationCaisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptStatusOperationCaisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptStatusOperationCaisse[]    findAll()
 * @method CptStatusOperationCaisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptStatusOperationCaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptStatusOperationCaisse::class);
    }

    // /**
    //  * @return CptStatusOperationCaisse[] Returns an array of CptStatusOperationCaisse objects
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
    public function findOneBySomeField($value): ?CptStatusOperationCaisse
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
