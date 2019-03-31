<?php

namespace App\Repository;

use App\Entity\Pronostiqueur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Pronostiqueur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pronostiqueur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pronostiqueur[]    findAll()
 * @method Pronostiqueur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PronostiqueurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Pronostiqueur::class);
    }

    public function printAll(){
        return $this->createQueryBuilder('p')
            ->orderBy('p.tauxReussite' , 'DESC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return Pronostiqueur[] Returns an array of Pronostiqueur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Pronostiqueur
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
