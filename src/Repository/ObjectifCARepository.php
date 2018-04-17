<?php

namespace App\Repository;

use App\Entity\ObjectifCA;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ObjectifCA|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjectifCA|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjectifCA[]    findAll()
 * @method ObjectifCA[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectifCARepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ObjectifCA::class);
    }

//    /**
//     * @return ObjectifCA[] Returns an array of ObjectifCA objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ObjectifCA
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
