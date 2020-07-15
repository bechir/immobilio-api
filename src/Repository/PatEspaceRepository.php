<?php

/*
 * This file is part of the Immobilio API.
 * (c) Bechir Ba <bechiirr71@gmail.com>
 */

namespace App\Repository;

use App\Entity\CmlFacture;
use App\Entity\CmlFactureEspace;
use App\Entity\PatEspace;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PatEspace|null find($id, $lockMode = null, $lockVersion = null)
 * @method PatEspace|null findOneBy(array $criteria, array $orderBy = null)
 * @method PatEspace[]    findAll()
 * @method PatEspace[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PatEspaceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PatEspace::class);
    }

    public function getTauxOccupationByAgenceByNatureEspace(string $codeAgence, string $dateDebut = null, string $dateFin = null)
    {
        return $this->buildPeriodQuery($dateDebut, $dateFin)
                    ->andWhere('e.codeAgence = :codeAgence')
                    ->setParameter('codeAgence', $codeAgence)
                    ->groupBy('e.natureEspace')
                    ->select('n.libelle as type')
                    ->addSelect('COUNT(n) as occupations')
                    ->getQuery()->getScalarResult();
    }

    public function getTauxOccupationByAgence(string $codeAgence, string $dateDebut = null, string $dateFin = null)
    {
        return $this->getAssocResults(
            $this->buildPeriodQuery($dateDebut, $dateFin)
                ->andWhere('e.codeAgence = :codeAgence')
                ->setParameter('codeAgence', $codeAgence)
        );
    }

    public function buildPeriodQuery(string $start = null, string $end = null)
    {
        if (!$start) {
            $start = (new \DateTime('-12 months'))->format('Y-m-d');
        }
        if (!$end) {
            $end = (new \DateTime())->format('Y-m-d');
        }

        return $this->createQueryBuilder('e')
            ->leftJoin('e.natureEspace', 'n')
                ->addSelect('n')
            ->leftJoin(CmlFactureEspace::class, 'factEspace', Join::WITH, 'factEspace.espace = e.id')
            ->leftJoin(CmlFacture::class, 'f', Join::WITH, 'f.id = factEspace.facture')
            ->andWhere('f.dateFacture BETWEEN :startDate AND :endDate')
            ->setParameter('startDate', $start)
            ->setParameter('endDate', $end);
    }

    public function getAssocResults(QueryBuilder $queryBuilder)
    {
        return $queryBuilder->getQuery()->getResult(\PDO::FETCH_ASSOC);
    }
}
