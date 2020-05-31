<?php

namespace App\Repository;

use App\Entity\Member;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @method Member|null find($id, $lockMode = null, $lockVersion = null)
 * @method Member|null findOneBy(array $criteria, array $orderBy = null)
 * @method Member[]    findAll()
 * @method Member[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MemberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Member::class);
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
     * @return Member|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findByToken(string $token): ?Member
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
     * @return Member|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getMemberByEmail(string $username): ?Member
    {
        return $this->createQueryBuilder('u')
            ->where('u.username = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }



    //Get members with the same ema
    public function getMembersByEmail($email)
    {
        $connection = $this->getEntityManager()->getConnection();

        $query = "SELECT * from public.member where email=:email";
        $params = array('email'=>$email);
        //$stmt = $connection->prepare($query);
        //$stmt->execute($params);
        $stmt = $connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }


 	//Get members notifications 
    public function getMembersNotifications()
    {
        $connection = $this->getEntityManager()->getConnection();

        $query = "SELECT * from public.member where email=:email";
        $params = array('email'=>$email);
        //$stmt = $connection->prepare($query);
        //$stmt->execute($params);
        $stmt = $connection->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
    
     public function findNotifications($member_id)
	 {
    	 $qb = $this
        	 ->createQueryBuilder('m')
         	->select('m,mn')
         	->join('m.memberNotification', 'mn')
         	->where('m.id = :memberId')
            ->setParameter('memberId', $member_id);
	     return $qb->getQuery()->getArrayResult();
	 }
}
