<?php

/*
 * This file is part of the Immobilio API application.
 */

namespace App\Repository;

use App\Entity\PatBienImmobilier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PatBienImmobilier|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatBienImmobilier|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatBienImmobilier[]    findAll()
 * @method PatBienImmobilier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatBienImmobilierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatBienImmobilier::class);
    }
}
