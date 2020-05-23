<?php

namespace App\Repository;

use App\Entity\NPersonalityStyleTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NPersonalityStyleTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NPersonalityStyleTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NPersonalityStyleTranslation[]    findAll()
 * @method NPersonalityStyleTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NPersonalityStyleTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NPersonalityStyleTranslation::class);
    }

    // /**
    //  * @return NPersonalityStyleTranslation[] Returns an array of NPersonalityStyleTranslation objects
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
    public function findOneBySomeField($value): ?NPersonalityStyleTranslation
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
