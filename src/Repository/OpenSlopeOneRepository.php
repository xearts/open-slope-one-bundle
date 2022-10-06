<?php

namespace Xearts\OpenSlopeOneBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Xearts\OpenSlopeOneBundle\Entity\OpenSlopeOne;

/**
 * @method OpenSlopeOne|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpenSlopeOne|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpenSlopeOne[]    findAll()
 * @method OpenSlopeOne[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpenSlopeOneRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpenSlopeOne::class);
    }

    public function add(OpenSlopeOne $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OpenSlopeOne $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getRecommendedItemsByItemId(int $itemId, int $limit = 20): array
    {
        $sql = 'select item_id2 from open_slope_one where item_id1 = ?'
            . ' group by item_id2 order by sum(rating/times) limit ?';
        return  $this->_em->getConnection()->fetchFirstColumn($sql, [$itemId, $limit]);
    }

    public function getRecommendedItemsByUserUserId(int $userId, int $limit = 20): array
    {
        $sql = 'select s.item_id2 from open_slope_one s,open_slope_one_rating u'
            . ' where u.user_id = ? and s.item_id1 = u.item_id and s.item_id2 != u.item_id'
            . ' group by s.item_id2 order by sum(u.rating * s.times - s.rating)/sum(s.times) desc limit ?';
        return  $this->_em->getConnection()->fetchFirstColumn($sql, [$userId, $limit]);
    }

    // /**
    //  * @return OpenSlopeOne[] Returns an array of OrderItem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OpenSlopeOne
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
