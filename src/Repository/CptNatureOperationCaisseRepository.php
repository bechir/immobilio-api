<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CptNatureOperationCaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptNatureOperationCaisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptNatureOperationCaisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptNatureOperationCaisse[]    findAll()
 * @method CptNatureOperationCaisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptNatureOperationCaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptNatureOperationCaisse::class);
    }

    // /**
    //  * @return CptNatureOperationCaisse[] Returns an array of CptNatureOperationCaisse objects
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
    public function findOneBySomeField($value): ?CptNatureOperationCaisse
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
