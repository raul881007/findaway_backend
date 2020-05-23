<?php

namespace App\Repository;

use App\Entity\Supervisor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @method Supervisor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Supervisor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Supervisor[]    findAll()
 * @method Supervisor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SupervisorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Supervisor::class);
    }

    /**
     * @return mixed
     */
    public function getSummaryNew($days)
    {
        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('name', 'name');
        $rsm->addScalarResult('cnt', 'cnt');

        $query = $this
            ->getEntityManager()
            ->createNativeQuery(<<<SQL
                SELECT
                  days.name,
                  tmp.cnt
                FROM (
                  SELECT
                    to_char(date_trunc('day', (current_date - offs)), 'YYYY-MM-DD') AS name
                  FROM
                    generate_series(0, 29, 1) AS offs
                ) days
                  LEFT JOIN (
                    SELECT
                      to_char(date_trunc('day', c.created_at), 'YYYY-MM-DD') as name,
                      count(c.id) cnt
                    FROM
                      member c
                    WHERE
                      c.created_at BETWEEN :start AND :now 
                    GROUP BY
                      to_char(date_trunc('day', c.created_at), 'YYYY-MM-DD')
                ) tmp ON days.name = tmp.name
                ORDER BY days.name ASC
SQL
                , $rsm);

        $query->setParameters([
            'start' => (new \DateTime())->modify(-$days . ' days'),
            'now'   => new \DateTime(),
        ]);

        return $query->getResult(AbstractQuery::HYDRATE_ARRAY);
    }

    /**
     * @param string $token
     * @return Supervisor|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findByToken(string $token): ?Supervisor
    {
        return $this->createQueryBuilder('c')
            ->where('c.token = :token')
            ->andWhere('c.token is not null')
            ->setParameter('token', $token)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    /**
     * @param string $username
     * @return Supervisor|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getSupervisorByEmail(string $username): ?Supervisor
    {
        return $this->createQueryBuilder('u')
            ->where('u.username = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
