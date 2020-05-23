<?php

namespace App\Repository;

use App\Entity\NFeedbackTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NFeedbackTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method NFeedbackTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method NFeedbackTranslation[]    findAll()
 * @method NFeedbackTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NFeedbackTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NFeedbackTranslation::class);
    }

    // /**
    //  * @return NFeedbackTranslation[] Returns an array of NFeedbackTranslation objects
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
    public function findOneBySomeField($value): ?NFeedbackTranslation
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
