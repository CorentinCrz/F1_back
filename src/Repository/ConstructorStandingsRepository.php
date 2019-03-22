<?php

namespace App\Repository;

use App\Entity\ConstructorStandings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ConstructorStandings|null find($id, $lockMode = null, $lockVersion = null)
 * @method ConstructorStandings|null findOneBy(array $criteria, array $orderBy = null)
 * @method ConstructorStandings[]    findAll()
 * @method ConstructorStandings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConstructorStandingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ConstructorStandings::class);
    }

    // /**
    //  * @return ConstructorStandings[] Returns an array of ConstructorStandings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ConstructorStandings
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
