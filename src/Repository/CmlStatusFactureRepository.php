<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CmlStatusFacture;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlStatusFacture|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlStatusFacture|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlStatusFacture[]    findAll()
 * @method CmlStatusFacture[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlStatusFactureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlStatusFacture::class);
    }

    public function getEnabledStatus()
    {
        return $this->createQueryBuilder('s')
            ->select('s.code as id')
            ->addSelect('s.libelle as name')
            ->where('s.enabled = true')
            ->getQuery()->getResult();
    }
}
