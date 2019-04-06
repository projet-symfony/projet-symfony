<?php

namespace App\Repository;

use App\Entity\Jeu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query as QueryAlias;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Jeu|null find($id, $lockMode = null, $lockVersion = null)
 * @method Jeu|null findOneBy(array $criteria, array $orderBy = null)
 * @method Jeu[]    findAll()
 * @method Jeu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JeuRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Jeu::class);
    }

    /**
     * @return QueryAlias
     */
    public function printAll()
    {
        return $this->createQueryBuilder('J')
            ->orderBy('J.date', 'ASC')
            ->orderBy('J.heure', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function AllEquipe($Equipe,$id)
    {
        $query = "select j from App\Entity\Jeu j where j.".$Equipe."=".$id;
        $q = $this->_em->createQuery($query)
            ->setMaxResults(5);

        return $q->getResult();
        //return $this->findBy([$Equipe=>$id]);
    }
    // /**
    //  * @return Jeu[] Returns an array of Jeu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */


    /*
      public function findOneBySomeField($value): ?Jeu
      {
          return $this->createQueryBuilder('j')
              ->andWhere('j.id = :val')
              ->setParameter('val', $value)
              ->getQuery()
              ->getResult()
          ;
      }*/
    public function findAllId()
    {
      //  return $this->createQueryBuilder('J')
       // ->getQuery()
       // ->getResult();

        //$entityManager = $this->getEntityManager();

        //$query = $entityManager->createQuery(
         //   'SELECT J
        //FROM App\Entity\Jeu
        //WHERE J.id = :id'
        //)->setParameter('id', $id);

        // returns an array of Product objects
        //return $query->execute();
    }
}
