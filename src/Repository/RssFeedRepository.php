<?php

namespace App\Repository;

use App\Entity\RssFeed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method RssFeed|null find($id, $lockMode = null, $lockVersion = null)
 * @method RssFeed|null findOneBy(array $criteria, array $orderBy = null)
 * @method RssFeed[]    findAll()
 * @method RssFeed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RssFeedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RssFeed::class);
    }

    /**
     * @param $values
     * @return RssFeed[] Returns an array of RssFeed objects
     */
    public function getMostFrequentWords($values): array
    {
        return $this->createQueryBuilder('r')
            ->select(['r.word', 'r.count'])
            ->andWhere('r.word NOT IN (:val)')
            ->setParameter('val', $values)
            ->orderBy('r.count', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getArrayResult()
        ;
    }

    public function getRssFeed(): array
    {
        return $this->createQueryBuilder('r')
            ->select(['r.word', 'r.count'])
            ->orderBy('r.count', 'DESC')
            ->getQuery()
            ->getArrayResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?RssFeed
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
