<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CptGestionnaireCompte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptGestionnaireCompte|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptGestionnaireCompte|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptGestionnaireCompte[]    findAll()
 * @method CptGestionnaireCompte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptGestionnaireCompteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptGestionnaireCompte::class);
    }

    // /**
    //  * @return CptGestionnaireCompte[] Returns an array of CptGestionnaireCompte objects
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
    public function findOneBySomeField($value): ?CptGestionnaireCompte
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
