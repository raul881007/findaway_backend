<?php

namespace App\Repository;

use App\Entity\NPreferredTimeTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NPreferredTimeTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NPreferredTimeTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NPreferredTimeTranslation[]    findAll()
 * @method NPreferredTimeTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NPreferredTimeTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NPreferredTimeTranslation::class);
    }

    // /**
    //  * @return NPreferredTimeTranslation[] Returns an array of NPreferredTimeTranslation objects
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
    public function findOneBySomeField($value): ?NPreferredTimeTranslation
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
