<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CptMoyenPaiement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptMoyenPaiement|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptMoyenPaiement|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptMoyenPaiement[]    findAll()
 * @method CptMoyenPaiement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptMoyenPaiementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptMoyenPaiement::class);
    }

    // /**
    //  * @return CptMoyenPaiement[] Returns an array of CptMoyenPaiement objects
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
    public function findOneBySomeField($value): ?CptMoyenPaiement
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
