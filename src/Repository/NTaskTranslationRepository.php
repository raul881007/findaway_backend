<?php

namespace App\Repository;

use App\Entity\NTaskTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NTaskTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NTaskTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NTaskTranslation[]    findAll()
 * @method NTaskTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NTaskTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NTaskTranslation::class);
    }

    // /**
    //  * @return NTaskTranslation[] Returns an array of NTaskTranslation objects
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
    public function findOneBySomeField($value): ?NTaskTranslation
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
