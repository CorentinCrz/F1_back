<?php

namespace App\Repository;

use App\Entity\LapTimes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LapTimes|null find($id, $lockMode = null, $lockVersion = null)
 * @method LapTimes|null findOneBy(array $criteria, array $orderBy = null)
 * @method LapTimes[]    findAll()
 * @method LapTimes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LapTimesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LapTimes::class);
    }

    // /**
    //  * @return LapTimes[] Returns an array of LapTimes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LapTimes
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
