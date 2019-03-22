<?php

namespace App\Repository;

use App\Entity\Qualifyings;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Qualifyings|null find($id, $lockMode = null, $lockVersion = null)
 * @method Qualifyings|null findOneBy(array $criteria, array $orderBy = null)
 * @method Qualifyings[]    findAll()
 * @method Qualifyings[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class QualifyingsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Qualifyings::class);
    }

    // /**
    //  * @return Qualifyings[] Returns an array of Qualifyings objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('q.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Qualifyings
    {
        return $this->createQueryBuilder('q')
            ->andWhere('q.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
