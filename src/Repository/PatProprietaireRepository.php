<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
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

    public function getPatrimoineProprietairesByClientsOrAgencesOrScisOrDate($params = [])
    {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.createdBy', 'createdBy')->addSelect('createdBy')

            ->select('p.reference')
            ->addSelect('p.nom')
            ->addSelect('p.prenoms')
            ->addSelect('p.email')
            ->addSelect('p.telephone1 as tel')
            ->addSelect('createdBy.username as creePar')
            ->addSelect('SUBSTRING(p.createdAt, 1, 10) as creeLe')

            ->where('p.deleted = 0');

        // if(isset($params['agences']) && !empty($params['agences'])) {
        //     $qb->andWhere($qb->expr()->in('agence.id', explode(',', $params['agences'])));
        // }

        // if(isset($params['scis']) && !empty($params['scis'])) {
        //     $qb->andWhere($qb->expr()->in('patSci.id', explode(',', $params['scis'])));
        // }

        if (isset($params['startDate']) && !empty($params['startDate'])) {
            $qb->andWhere('p.createdAt > :startDate')->setParameter('startDate', $params['startDate']);
        }

        if (isset($params['endDate']) && !empty($params['endDate'])) {
            $qb->andWhere('p.createdAt < :endDate')->setParameter('endDate', $params['endDate']);
        }

        return $qb->getQuery()->getResult();
    }
}
