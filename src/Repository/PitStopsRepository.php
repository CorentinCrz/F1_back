<?php

namespace App\Repository;

use App\Entity\PitStops;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PitStops|null find($id, $lockMode = null, $lockVersion = null)
 * @method PitStops|null findOneBy(array $criteria, array $orderBy = null)
 * @method PitStops[]    findAll()
 * @method PitStops[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PitStopsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PitStops::class);
    }

    // /**
    //  * @return PitStops[] Returns an array of PitStops objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PitStops
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
