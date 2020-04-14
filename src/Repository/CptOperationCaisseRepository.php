<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\CptOperationCaisse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CptOperationCaisse|null find($id, $lockMode = null, $lockVersion = null)
 * @method CptOperationCaisse|null findOneBy(array $criteria, array $orderBy = null)
 * @method CptOperationCaisse[]    findAll()
 * @method CptOperationCaisse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CptOperationCaisseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CptOperationCaisse::class);
    }

    public function getPaiementsFactureByDatesAgenceSci($agenceId, $sciId, $startDate, $endDate)
    {
        return $this->createQueryBuilder('o')
            ->where('o.agenceId = :agence')
            ->andWhere('o.sciId = :sci')
            ->andWhere('o.dateOperation BETWEEN :startDate AND :endDate')
            ->setParameter('agence', $agenceId)
            ->setParameter('sci', $sciId)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery()
            ->getResult();
    }

    public function getPaiementsFactureByDatesClientSci($clientId, $startDate, $endDate)
    {
        return $this->createQueryBuilder('o')
            ->where('o.clientId = :client')
            ->andWhere('o.dateOperation BETWEEN :startDate AND :endDate')
            ->setParameter('client', $clientId)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery()
            ->getResult();
    }
}
