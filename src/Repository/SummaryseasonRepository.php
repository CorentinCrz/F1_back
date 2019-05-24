<?php

namespace App\Repository;

use App\Entity\Summaryseason;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Summaryseason|null find($id, $lockMode = null, $lockVersion = null)
 * @method Summaryseason|null findOneBy(array $criteria, array $orderBy = null)
 * @method Summaryseason[]    findAll()
 * @method Summaryseason[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SummaryseasonRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Summaryseason::class);
    }

    // /**
    //  * @return Summaryseason[] Returns an array of Summaryseason objects
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
    public function findOneBySomeField($value): ?Summaryseason
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
