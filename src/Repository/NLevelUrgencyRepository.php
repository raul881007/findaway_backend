<?php

namespace App\Repository;

use App\Entity\NLevelUrgency;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NLevelUrgency|null find($id, $lockMode = null, $lockVersion = null)
 * @method NLevelUrgency|null findOneBy(array $criteria, array $orderBy = null)
 * @method NLevelUrgency[]    findAll()
 * @method NLevelUrgency[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NLevelUrgencyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NLevelUrgency::class);
    }

//    /**
//     * @return NLevelUrgency[] Returns an array of NLevelUrgency objects
//     */
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
    public function findOneBySomeField($value): ?NLevelUrgency
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    /**
     * @return array
     */
    public function getNLevelUrgency(): array
    {
        return $this->createQueryBuilder('c')
            ->select('c')
            ->andWhere('c.isActive = true')
            ->orderBy('c.id', 'asc')
            ->getQuery()
            ->getResult()
        ;
    }
}
