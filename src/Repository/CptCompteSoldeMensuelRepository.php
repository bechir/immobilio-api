<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CptCompteSoldeMensuel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptCompteSoldeMensuel|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptCompteSoldeMensuel|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptCompteSoldeMensuel[]    findAll()
 * @method CptCompteSoldeMensuel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptCompteSoldeMensuelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptCompteSoldeMensuel::class);
    }

    // /**
    //  * @return CptCompteSoldeMensuel[] Returns an array of CptCompteSoldeMensuel objects
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
    public function findOneBySomeField($value): ?CptCompteSoldeMensuel
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
