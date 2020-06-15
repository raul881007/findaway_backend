<?php

namespace App\Repository;

use App\Entity\UserMesages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserMesages|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserMesages|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserMesages[]    findAll()
 * @method UserMesages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserMesagesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserMesages::class);
    }

    // /**
    //  * @return UserMesages[] Returns an array of UserMesages objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserMesages
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
