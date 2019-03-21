<?php

namespace App\Repository;

use App\Entity\Constructors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Constructors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Constructors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Constructors[]    findAll()
 * @method Constructors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConstructorsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Constructors::class);
    }

    // /**
    //  * @return Constructors[] Returns an array of Constructors objects
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
    public function findOneBySomeField($value): ?Constructors
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
