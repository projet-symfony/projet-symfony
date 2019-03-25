<?php

namespace App\Repository;

use App\Entity\VoteFinal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VoteFinal|null find($id, $lockMode = null, $lockVersion = null)
 * @method VoteFinal|null findOneBy(array $criteria, array $orderBy = null)
 * @method VoteFinal[]    findAll()
 * @method VoteFinal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoteFinalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VoteFinal::class);
    }

    // /**
    //  * @return VoteFinal[] Returns an array of VoteFinal objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VoteFinal
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
