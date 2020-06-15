<?php

namespace App\Repository;

use App\Entity\UserConversations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method UserConversations|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserConversations|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserConversations[]    findAll()
 * @method UserConversations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserConversationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserConversations::class);
    }

    // /**
    //  * @return UserConversations[] Returns an array of UserConversations objects
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
    public function findOneBySomeField($value): ?UserConversations
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
