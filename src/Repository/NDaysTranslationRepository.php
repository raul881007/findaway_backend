<?php

namespace App\Repository;

use App\Entity\NDaysTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NDaysTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NDaysTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NDaysTranslation[]    findAll()
 * @method NDaysTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NDaysTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NDaysTranslation::class);
    }

    // /**
    //  * @return NDaysTranslation[] Returns an array of NDaysTranslation objects
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
    public function findOneBySomeField($value): ?NDaysTranslation
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
