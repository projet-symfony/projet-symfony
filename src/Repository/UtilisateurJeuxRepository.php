<?php

namespace App\Repository;

use App\Entity\UtilisateurJeux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\AST\Join;
/**
 * @method UtilisateurJeux|null find($id, $lockMode = null, $lockVersion = null)
 * @method UtilisateurJeux|null findOneBy(array $criteria, array $orderBy = null)
 * @method UtilisateurJeux[]    findAll()
 * @method UtilisateurJeux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UtilisateurJeuxRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UtilisateurJeux::class);
    }

    /**
     * @return all[]
     */
    public function getThemAll(): array
    {
      /*  return $this->createQueryBuilder('uj')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();*/

      $entityManager=$this->getEntityManager();
      $query= $entityManager->createQuery(
          'SELECT u.id, u.Prenom , uj.numPronostique, uj.heure, e1.NomEquipe, e2.NomEquipe
                from App\Entity\jeu j , App\Entity\utilisateur u, App\Entity\UtilisateurJeux uj, App\Entity\Equipe e1, App\Entity\Equipe e2
                where u.id=uj.utilisateur and j.id=uj.jeu and e1.id=j.idEquipe1 and e2.id=j.idEquipe2 ORDER BY uj.heure DESC'
                );
      return $query->execute();

    }
    // /**
    //  * @return UtilisateurJeux[] Returns an array of UtilisateurJeux objects
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
    public function findOneBySomeField($value): ?UtilisateurJeux
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
