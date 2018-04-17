<?php

namespace App\Repository;

use App\Entity\Prime;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Prime|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prime|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prime[]    findAll()
 * @method Prime[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrimeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Prime::class);
    }

//    /**
//     * @return Prime[] Returns an array of Prime objects
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
    public function findOneBySomeField($value): ?Prime
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
