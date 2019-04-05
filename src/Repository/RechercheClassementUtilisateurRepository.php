<?php

namespace App\Repository;

use App\Entity\RechercheClassementUtilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RechercheClassementUtilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method RechercheClassementUtilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method RechercheClassementUtilisateur[]    findAll()
 * @method RechercheClassementUtilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RechercheClassementUtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RechercheClassementUtilisateur::class);
    }

    // /**
    //  * @return RechercheClassementUtilisateur[] Returns an array of RechercheClassementUtilisateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RechercheClassementUtilisateur
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
