<?php

namespace App\Repository;

use App\Entity\NPreferredTime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NPreferredTime|null find($id, $lockMode = null, $lockVersion = null)
 * @method NPreferredTime|null findOneBy(array $criteria, array $orderBy = null)
 * @method NPreferredTime[]    findAll()
 * @method NPreferredTime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NPreferredTimeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NPreferredTime::class);
    }

//    /**
//     * @return NPreferredTime[] Returns an array of NPreferredTime objects
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
    public function findOneBySomeField($value): ?NPreferredTime
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
    public function getNPreferredTime(): array
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
