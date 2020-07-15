<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Repository;

use App\Entity\PatSci;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PatSci|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatSci|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatSci[]    findAll()
 * @method PatSci[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatSciRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatSci::class);
    }

    public function getScis()
    {
        return $this->createQueryBuilder('s')
            ->select('s.libelle as name')
            ->addSelect('s.id')
            ->getQuery()->getResult();
    }
}
