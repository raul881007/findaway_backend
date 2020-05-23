<?php

namespace App\Repository;

use App\Entity\NCompliment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NCompliment|null find($id, $lockMode = null, $lockVersion = null)
 * @method NCompliment|null findOneBy(array $criteria, array $orderBy = null)
 * @method NCompliment[]    findAll()
 * @method NCompliment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NComplimentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NCompliment::class);
    }

//    /**
//     * @return NCompliment[] Returns an array of NCompliment objects
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
    public function findOneBySomeField($value): ?NCompliment
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
    public function getNCompliment(): array
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
