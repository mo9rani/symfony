<?php

namespace App\Repository;

use App\Entity\ProductAvis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ProductAvis|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductAvis|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductAvis[]    findAll()
 * @method ProductAvis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductAvisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductAvis::class);
    }

    // /**
    //  * @return ProductAvis[] Returns an array of ProductAvis objects
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
    public function findOneBySomeField($value): ?ProductAvis
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
