<?php

namespace App\Repository;

use App\Entity\Objectif;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Objectif|null find($id, $lockMode = null, $lockVersion = null)
 * @method Objectif|null findOneBy(array $criteria, array $orderBy = null)
 * @method Objectif[]    findAll()
 * @method Objectif[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ObjectifRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Objectif::class);
    }

    /**
     * @return Objectif[] Returns an array of Objectif objects
     */
    public function findByDate(\DateTime $date)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.dateFin <= :date')
            ->setParameter('date', $date->format('Y-m-j'))
            ->andWhere('a.prime is null')
            ->getQuery()
            ->getResult()
        ;
    }


    public function findByCommercial($u)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.commercial = :u')
            ->setParameter('u', $u)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Objectif
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
