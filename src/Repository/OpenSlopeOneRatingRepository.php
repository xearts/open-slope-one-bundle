<?php

namespace Xearts\OpenSlopeOneBundle\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Xearts\OpenSlopeOneBundle\Entity\OpenSlopeOneRating;

/**
 * @method OpenSlopeOneRating|null find($id, $lockMode = null, $lockVersion = null)
 * @method OpenSlopeOneRating|null findOneBy(array $criteria, array $orderBy = null)
 * @method OpenSlopeOneRating[]    findAll()
 * @method OpenSlopeOneRating[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpenSlopeOneRatingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OpenSlopeOneRating::class);
    }

    public function add(OpenSlopeOneRating $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OpenSlopeOneRating $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function addRating(int $itemId, int $userId, bool $flush = false): void
    {
        $rating = $this->findOneBy(['itemId' => $itemId, 'userId' => $userId]);
        if (!$rating) {
            $rating = new OpenSlopeOneRating($itemId, $userId);
        }
        $rating->setRating((string)((int)$rating->getRating() + 1));
        $this->add($rating, $flush);
    }


    // /**
    //  * @return OpenSlopeOneRating[] Returns an array of OrderItem objects
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
    public function findOneBySomeField($value): ?OpenSlopeOneRating
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
