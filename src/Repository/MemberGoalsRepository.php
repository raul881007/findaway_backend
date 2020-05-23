<?php

namespace App\Repository;

use App\Entity\MemberGoals;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MemberGoals|null find($id, $lockMode = null, $lockVersion = null)
 * @method MemberGoals|null findOneBy(array $criteria, array $orderBy = null)
 * @method MemberGoals[]    findAll()
 * @method MemberGoals[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MemberGoalsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MemberGoals::class);
    }

    // /**
    //  * @return MemberGoals[] Returns an array of MemberGoals objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MemberGoals
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
