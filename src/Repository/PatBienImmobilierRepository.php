<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
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

    public function getPatrimoineBiensByClientsOrAgencesOrScisOrDate($params = [])
    {
        $qb = $this->createQueryBuilder('b')
            ->leftJoin('b.proprietaire', 'p')->addSelect('p')
            ->leftJoin('b.sci', 's')->addSelect('s')

            ->select('b.reference')
            ->addSelect('b.libelle')
            ->addSelect('b.description')
            ->addSelect('b.adresse')
            ->addSelect('s.libelle as sci')
            ->addSelect('p.nom as proprietaire')

            ->where('b.deleted = 0');

        // if(isset($params['agences']) && !empty($params['agences'])) {
        //     $qb->andWhere($qb->expr()->in('agence.id', explode(',', $params['agences'])));
        // }

        // if(isset($params['scis']) && !empty($params['scis'])) {
        //     $qb->andWhere($qb->expr()->in('patSci.id', explode(',', $params['scis'])));
        // }

        if(isset($params['startDate']) && !empty($params['startDate'])) {
            $qb->andWhere('b.createdAt > :startDate')->setParameter('startDate', $params['startDate']);
        }

        if(isset($params['endDate']) && !empty($params['endDate'])) {
            $qb->andWhere('b.createdAt < :endDate')->setParameter('endDate', $params['endDate']);
        }    

        return $qb->getQuery()->getResult();
    }
}
