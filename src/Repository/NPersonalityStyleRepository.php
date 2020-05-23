<?php

namespace App\Repository;

use App\Entity\NPersonalityStyle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method NPersonalityStyle|null find($id, $lockMode = null, $lockVersion = null)
 * @method NPersonalityStyle|null findOneBy(array $criteria, array $orderBy = null)
 * @method NPersonalityStyle[]    findAll()
 * @method NPersonalityStyle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NPersonalityStyleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NPersonalityStyle::class);
    }

//    /**
//     * @return NPersonalityStyle[] Returns an array of NPersonalityStyle objects
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
    public function findOneBySomeField($value): ?NPersonalityStyle
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
    public function getNPersonalityStyle(): array
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
