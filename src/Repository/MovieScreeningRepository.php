<?php

namespace App\Repository;

use App\Entity\MovieScreening;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MovieScreening|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovieScreening|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovieScreening[]    findAll()
 * @method MovieScreening[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieScreeningRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovieScreening::class);
    }

    // /**
    //  * @return MovieScreening[] Returns an array of MovieScreening objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MovieScreening
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
