<?php

namespace App\Repository;

use App\Entity\SummarySeason;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SummarySeason|null find($id, $lockMode = null, $lockVersion = null)
 * @method SummarySeason|null findOneBy(array $criteria, array $orderBy = null)
 * @method SummarySeason[]    findAll()
 * @method SummarySeason[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SummarySeasonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SummarySeason::class);
    }

    // /**
    //  * @return SummarySeason[] Returns an array of SummarySeason objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SummarySeason
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
