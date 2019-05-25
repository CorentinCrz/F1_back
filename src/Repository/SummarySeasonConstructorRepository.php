<?php

namespace App\Repository;

use App\Entity\SummarySeasonConstructor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SummarySeasonConstructor|null find($id, $lockMode = null, $lockVersion = null)
 * @method SummarySeasonConstructor|null findOneBy(array $criteria, array $orderBy = null)
 * @method SummarySeasonConstructor[]    findAll()
 * @method SummarySeasonConstructor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SummarySeasonConstructorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SummarySeasonConstructor::class);
    }

    // /**
    //  * @return SummarySeasonConstructor[] Returns an array of SummarySeasonConstructor objects
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
    public function findOneBySomeField($value): ?SummarySeasonConstructor
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
