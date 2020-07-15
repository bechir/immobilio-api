<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Repository;

use App\Entity\CmlContrat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlContrat|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlContrat|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlContrat[]    findAll()
 * @method CmlContrat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlContratRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlContrat::class);
    }

    public function getAnalyseContratsByClientsOrDate($params)
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.client', 'cl')->addSelect('cl')
            ->select('c.numContrat')
            ->addSelect('SUBSTRING(c.dateSignature, 1, 10) as dateSign')
            ->addSelect('SUBSTRING(c.createdAt, 1, 10) as dateEnreg')
            ->addSelect('c.montantTotal as montant')
            ->addSelect('c.reference')
            ->addSelect('c.contenu')
            ->addSelect('cl.nom as nomClient')
            ->addSelect('cl.prenom as prenomClient')
            ->addSelect('c.cycleFacturation as nbEspaces')
            ->where('c.deleted = 0');

        if (isset($params['startDate']) && !empty($params['startDate'])) {
            $qb->andWhere('c.dateSignature > :startDate')->setParameter('startDate', $params['startDate']);
        }

        if (isset($params['endDate']) && !empty($params['endDate'])) {
            $qb->andWhere('c.dateSignature < :endDate')->setParameter('endDate', $params['endDate']);
        }

        return $qb->getQuery()->getResult();
    }
}
