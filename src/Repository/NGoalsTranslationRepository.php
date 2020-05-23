<?php

namespace App\Repository;

use App\Entity\NGoalsTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NGoalsTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NGoalsTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NGoalsTranslation[]    findAll()
 * @method NGoalsTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NGoalsTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NGoalsTranslation::class);
    }

    // /**
    //  * @return NGoalsTranslation[] Returns an array of NGoalsTranslation objects
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
    public function findOneBySomeField($value): ?NGoalsTranslation
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
