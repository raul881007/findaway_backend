<?php

namespace App\Repository;

use App\Entity\NSpecicOutcome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NSpecicOutcome|null find($id, $lockMode = null, $lockVersion = null)
 * @method NSpecicOutcome|null findOneBy(array $criteria, array $orderBy = null)
 * @method NSpecicOutcome[]    findAll()
 * @method NSpecicOutcome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NSpecicOutcomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NSpecicOutcome::class);
    }

//    /**
//     * @return NSpecicOutcome[] Returns an array of NSpecicOutcome objects
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
    public function findOneBySomeField($value): ?NSpecicOutcome
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
    public function getNSpecicOutcome(): array
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
