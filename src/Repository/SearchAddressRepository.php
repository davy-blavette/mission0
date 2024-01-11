<?php

namespace App\Repository;

use App\Entity\SearchAddress;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SearchAddress>
 *
 * @method SearchAddress|null find($id, $lockMode = null, $lockVersion = null)
 * @method SearchAddress|null findOneBy(array $criteria, array $orderBy = null)
 * @method SearchAddressSearchAddressRepository    findAll()
 * @method SearchAddress[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SearchAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SearchAddress::class);
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
