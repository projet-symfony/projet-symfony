<?php

namespace App\Repository;

use App\Entity\ClassementClub;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ClassementClub|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassementClub|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassementClub[]    findAll()
 * @method ClassementClub[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassementClubRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ClassementClub::class);
    }

    public function printAll()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.points', 'DESC')
            ->getQuery()
            ->getResult();
    }

    // /**
    //  * @return ClassementClub[] Returns an array of ClassementClub objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClassementClub
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
