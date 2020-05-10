<?php

/*
 * This file is part of the Immobilio API.
 * (c) KuTiWa, Inc.
 */

namespace App\Repository;

use App\Entity\CmlClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CmlClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method CmlClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method CmlClient[]    findAll()
 * @method CmlClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CmlClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CmlClient::class);
    }
    public function getClients(string $startDate = null, string $endDate = null)
    {
        return $this->buildPeriodQuery($startDate, $endDate)
            ->getQuery()->getResult();
    }

    public function getAnalyseClientsByClientsOrDate($params = [])
    {
        $qb = $this->createQueryBuilder('c')
            ->select('c.raisonSociale')
            ->addSelect('c.adresse as localisation')
            ->addSelect('c.personnePrincipalNom as interlocuteur')
            ->addSelect('c.telClient as tel')
            ->addSelect('c.emailClient as email')
            // ->addSelect('c.affecteA')
            ->where('c.deleted = 0');

            if(isset($params['clients']) && !empty($params['clients'])) {
                $qb->andWhere($qb->expr()->in('c.id', explode(',', $params['clients'])));
            }

            if(isset($params['startDate']) && !empty($params['startDate'])) {
                $qb->andWhere('c.createdA > :startDate')->setParameter('startDate', $params['startDate']);
            }
    
            if(isset($params['endDate']) && !empty($params['endDate'])) {
                $qb->andWhere('c.createdA < :endDate')->setParameter('endDate', $params['endDate']);
            }    

            return $qb->getQuery()->getResult();
    }

    public function buildPeriodQuery(string $start = null, string $end = null)
    {
        if (!$start) {
            $start = (new \DateTime('-5 years'))->format('Y-m-d');
        }
        if (!$end) {
            $end = (new \DateTime())->format('Y-m-d');
        }

        return $this->createQueryBuilder('c')
            ->leftJoin('c.typeClient', 't')->addSelect('t')
            ->andWhere('c.createdAt BETWEEN :startDate AND :endDate')
            ->andWhere('t.id = 1')
            ->setParameter('startDate', $start)
            ->setParameter('endDate', $end);
    }
}
