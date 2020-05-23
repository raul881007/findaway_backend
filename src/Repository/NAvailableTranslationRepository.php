<?php

namespace App\Repository;

use App\Entity\NAvailableTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NAvailableTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NAvailableTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NAvailableTranslation[]    findAll()
 * @method NAvailableTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NAvailableTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NAvailableTranslation::class);
    }

    // /**
    //  * @return NAvailableTranslation[] Returns an array of NAvailableTranslation objects
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
    public function findOneBySomeField($value): ?NAvailableTranslation
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
