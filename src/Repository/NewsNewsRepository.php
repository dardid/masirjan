<?php

namespace App\Repository;

use App\Entity\NewsNews;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NewsNews|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewsNews|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewsNews[]    findAll()
 * @method NewsNews[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewsNewsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewsNews::class);
    }

    // /**
    //  * @return NewsNews[] Returns an array of NewsNews objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewsNews
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
