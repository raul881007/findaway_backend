<?php

namespace App\Repository;

use App\Entity\NAvailable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NAvailable|null find($id, $lockMode = null, $lockVersion = null)
 * @method NAvailable|null findOneBy(array $criteria, array $orderBy = null)
 * @method NAvailable[]    findAll()
 * @method NAvailable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NAvailableRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NAvailable::class);
    }

//    /**
//     * @return NAvailable[] Returns an array of NAvailable objects
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
    public function findOneBySomeField($value): ?NAvailable
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
    public function getNAvailable(): array
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
