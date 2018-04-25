<?php

namespace App\Repository;

use App\Entity\Vente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vente|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vente|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vente[]    findAll()
 * @method Vente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VenteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vente::class);
    }

    /**
     * @return Vente[] Returns an array of Vente objects
     */
    public function findByCommercialAndDates($commercial,$dateD,$dateF)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.commercial = :commercial')
            ->setParameter('commercial', $commercial)
            ->andWhere('v.date BETWEEN :dateD AND :dateF')
            ->setParameter('dateD', $dateD->format('Y-m-j'))
            ->setParameter('dateF', $dateF->format('Y-m-j'))
            //->andWhere('v.date >= :dateD')
            //->setParameter('dateD', $dateD->format('Y-m-j'))
            //->andWhere('v.date <= :dateF')
            //->setParameter('dateF', $dateF->format('Y-m-j'))
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Vente
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
