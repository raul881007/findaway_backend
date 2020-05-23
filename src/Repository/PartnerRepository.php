<?php

namespace App\Repository;

use App\Entity\Partner;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\AbstractQuery;
use Doctrine\ORM\Query\ResultSetMapping;

/**
 * @method Partner|null find($id, $lockMode = null, $lockVersion = null)
 * @method Partner|null findOneBy(array $criteria, array $orderBy = null)
 * @method Partner[]    findAll()
 * @method Partner[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PartnerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Partner::class);
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
     * @return Partner|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findByToken(string $token): ?Partner
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
     * @return Partner|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getPartnerByEmail(string $username): ?Partner
    {
        return $this->createQueryBuilder('u')
            ->where('u.username = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
    
    //Obtains the partners list matching it with the filters introduced by member
	public function getFilteredPartners($gender,$industry,$time,$personality)
    {
        $connection = $this->getEntityManager()->getConnection();
         
        if($gender != null){
	        $query = "SELECT * from public.partner where gender=:gender";
    	    $params = array('gender'=>$gender);
    	    $stmt = $connection->prepare($query);
	        $stmt->execute($params);
        }else{
        	$query = "SELECT * from public.partner";
        	$stmt = $connection->prepare($query);
	        $stmt->execute();
        }
        return $stmt->fetchAll();
    }
	
	//Obtains the partners list NO matching it with the filters introduced by member
	public function getNoMatchPartners($gender,$industry,$time,$personality)
    {
        $connection = $this->getEntityManager()->getConnection();
         
        if($gender != null){
	        $query = "SELECT * from public.partner where gender!=:gender";
    	    $params = array('gender'=>$gender);
    	    $stmt = $connection->prepare($query);
	        $stmt->execute($params);
        }else{
        	$query = "SELECT * from public.partner";
        	$stmt = $connection->prepare($query);
	        $stmt->execute();
        }
        return $stmt->fetchAll();
    }
    
    public function findAllArray()
 {
     $qb = $this
         ->createQueryBuilder('p')
         ->select('p,r,rn,rt')
         ->join('p.ratings', 'r')
         ->leftJoin('r.nCompliment', 'rn')
         ->leftJoin('rn.translations', 'rt');
     return $qb->getQuery()->getArrayResult();
 }
	
}
