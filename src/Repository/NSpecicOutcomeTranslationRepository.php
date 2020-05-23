<?php

namespace App\Repository;

use App\Entity\NSpecicOutcomeTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NSpecicOutcomeTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NSpecicOutcomeTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NSpecicOutcomeTranslation[]    findAll()
 * @method NSpecicOutcomeTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NSpecicOutcomeTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NSpecicOutcomeTranslation::class);
    }

    // /**
    //  * @return NSpecicOutcomeTranslation[] Returns an array of NSpecicOutcomeTranslation objects
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
    public function findOneBySomeField($value): ?NSpecicOutcomeTranslation
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
