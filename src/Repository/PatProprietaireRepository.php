<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\PatProprietaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PatProprietaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatProprietaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatProprietaire[]    findAll()
 * @method PatProprietaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatProprietaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatProprietaire::class);
    }

    // /**
    //  * @return PatProprietaire[] Returns an array of PatProprietaire objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PatProprietaire
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
