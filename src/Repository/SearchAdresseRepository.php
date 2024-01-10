<?php

namespace App\Repository;

use App\Entity\SearchAdresse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SearchAdresse>
 *
 * @method SearchAdresse|null find($id, $lockMode = null, $lockVersion = null)
 * @method SearchAdresse|null findOneBy(array $criteria, array $orderBy = null)
 * @method SearchAdresse[]    findAll()
 * @method SearchAdresse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SearchAdresseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SearchAdresse::class);
    }

//    /**
//     * @return SearchAdresse[] Returns an array of SearchAdresse objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SearchAdresse
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
