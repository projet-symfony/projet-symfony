<?php

namespace App\Repository;

use App\Entity\RechercheClassementUtilisateur;
use App\Entity\Utilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Utilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Utilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Utilisateur[]    findAll()
 * @method Utilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Utilisateur::class);
    }


    public function printAll(/*RechercheClassementUtilisateur $recherche*/){
        return $this->createQueryBuilder('u')
            ->orderBy('u.tauxReussite' , 'DESC')
            ->getQuery()
            ->getResult();

        //return $query->getQuery();
    }

    public function printJustFive(){
        return $this->createQueryBuilder('u')
            ->orderBy('u.tauxReussite' , 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();

    }

    public function findByPercentage(){
        //select * form user order by pourcentage DESC:
    }




    // /**
    //  * @return Utilisateur[] Returns an array of Utilisateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Utilisateur
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
