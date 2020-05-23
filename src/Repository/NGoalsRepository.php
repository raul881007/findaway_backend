<?php

namespace App\Repository;

use App\Entity\NGoals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NGoals|null find($id, $lockMode = null, $lockVersion = null)
 * @method NGoals|null findOneBy(array $criteria, array $orderBy = null)
 * @method NGoals[]    findAll()
 * @method NGoals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NGoalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NGoals::class);
    }

//    /**
//     * @return NGoals[] Returns an array of NGoals objects
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
    public function findOneBySomeField($value): ?NGoals
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
    public function getNGoals(): array
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
