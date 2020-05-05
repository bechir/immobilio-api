<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CptJournalCaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptJournalCaisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptJournalCaisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptJournalCaisse[]    findAll()
 * @method CptJournalCaisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptJournalCaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptJournalCaisse::class);
    }

    // /**
    //  * @return CptJournalCaisse[] Returns an array of CptJournalCaisse objects
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
    public function findOneBySomeField($value): ?CptJournalCaisse
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
