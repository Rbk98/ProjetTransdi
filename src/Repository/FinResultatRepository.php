<?php

namespace App\Repository;

use App\Entity\FinResultat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FinResultat|null find($id, $lockMode = null, $lockVersion = null)
 * @method FinResultat|null findOneBy(array $criteria, array $orderBy = null)
 * @method FinResultat[]    findAll()
 * @method FinResultat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FinResultatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FinResultat::class);
    }

    // /**
    //  * @return FinResultat[] Returns an array of FinResultat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FinResultat
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
