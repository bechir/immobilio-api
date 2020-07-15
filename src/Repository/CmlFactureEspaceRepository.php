<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Repository;

use App\Entity\CmlFactureEspace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlFactureEspace|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlFactureEspace|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlFactureEspace[]    findAll()
 * @method CmlFactureEspace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlFactureEspaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlFactureEspace::class);
    }

    // /**
    //  * @return CmlFactureEspace[] Returns an array of CmlFactureEspace objects
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
    public function findOneBySomeField($value): ?CmlFactureEspace
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
