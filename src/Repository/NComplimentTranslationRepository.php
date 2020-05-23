<?php

namespace App\Repository;

use App\Entity\NComplimentTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NComplimentTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NComplimentTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NComplimentTranslation[]    findAll()
 * @method NComplimentTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NComplimentTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NComplimentTranslation::class);
    }

    // /**
    //  * @return NComplimentTranslation[] Returns an array of NComplimentTranslation objects
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
    public function findOneBySomeField($value): ?NComplimentTranslation
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
