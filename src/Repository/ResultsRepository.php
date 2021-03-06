<?php

namespace App\Repository;

use App\Entity\Results;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Results|null find($id, $lockMode = null, $lockVersion = null)
 * @method Results|null findOneBy(array $criteria, array $orderBy = null)
 * @method Results[]    findAll()
 * @method Results[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ResultsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Results::class);
    }

     /**
      * @return Results[] Returns an array of Results objects
      */
    public function findByYearAndDriver($year, $driver)
    {
        return $this->createQueryBuilder('r')
            ->leftJoin('r.race', 'ra')
            ->andWhere('r.driver = :driver')
            ->andWhere('ra.year = :year')
            ->setParameter('driver', $driver)
            ->setParameter('year', $year)
            ->orderBy('r.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

     /**
      * @return Results[] Returns an array of Results objects
      */
    public function findByYearAndConstructor($year, $constructor)
    {
        return $this->createQueryBuilder('r')
            ->leftJoin('r.race', 'ra')
            ->andWhere('r.constructor = :constructor')
            ->andWhere('ra.year = :year')
            ->setParameter('constructor', $constructor)
            ->setParameter('year', $year)
            ->orderBy('r.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Results
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
