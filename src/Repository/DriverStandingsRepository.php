<?php

namespace App\Repository;

use App\Entity\DriverStandings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DriverStandings|null find($id, $lockMode = null, $lockVersion = null)
 * @method DriverStandings|null findOneBy(array $criteria, array $orderBy = null)
 * @method DriverStandings[]    findAll()
 * @method DriverStandings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DriverStandingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DriverStandings::class);
    }

    // /**
    //  * @return DriverStandings[] Returns an array of DriverStandings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findLastByDriverAndYear($driver, $year): ?DriverStandings
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.driver = :driver')
            ->leftJoin('d.race', 'r')
            ->andWhere('r.year = :year')
            ->setParameter('year', $year)
            ->setParameter('driver', $driver)
            ->orderBy('d.points', 'DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
