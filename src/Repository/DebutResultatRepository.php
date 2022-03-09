<?php

namespace App\Repository;

use App\Entity\DebutResultat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DebutResultat|null find($id, $lockMode = null, $lockVersion = null)
 * @method DebutResultat|null findOneBy(array $criteria, array $orderBy = null)
 * @method DebutResultat[]    findAll()
 * @method DebutResultat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DebutResultatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DebutResultat::class);
    }

    // /**
    //  * @return DebutResultat[] Returns an array of DebutResultat objects
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

    /*
    public function findOneBySomeField($value): ?DebutResultat
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
