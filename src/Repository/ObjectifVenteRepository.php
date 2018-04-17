<?php

namespace App\Repository;

use App\Entity\ObjectifVente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ObjectifVente|null find($id, $lockMode = null, $lockVersion = null)
 * @method ObjectifVente|null findOneBy(array $criteria, array $orderBy = null)
 * @method ObjectifVente[]    findAll()
 * @method ObjectifVente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectifVenteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ObjectifVente::class);
    }

//    /**
//     * @return ObjectifVente[] Returns an array of ObjectifVente objects
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
    public function findOneBySomeField($value): ?ObjectifVente
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
