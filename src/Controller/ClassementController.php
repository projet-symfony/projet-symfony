<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/03/2019
 * Time: 14:49
 */

namespace App\Controller;


use App\Entity\Utilisateur;
use App\Entity\RechercheClassement;
use App\Form\RechercheClassementType;
use App\Repository\EquipeRepository;
use App\Repository\UtilisateurRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Equipe;

class ClassementController extends AbstractController
{
    private $em;
    private $repository1;
    private $repository2;

    public function __Construct(EquipeRepository $repository1, UtilisateurRepository $repository2,ObjectManager $em){
        $this->em = $em;
        $this->repository1 = $repository1;
        $this->repository2 = $repository2;
    }

    /**
     * @Route("/Classement/ClassementClub", name="classementclub")
     * @return Response
     */
    public function indexClubs(PaginatorInterface $paginator,Request $request):Response{

        $recherche = new RechercheClassement();
        $form = $this->createForm(RechercheClassementType::class, $recherche);
        $form->handleRequest($request);
        //$clubs = $this->repository1->printAll();

        /*$club1= new ClassementClub();
        $club1->setClub("Juventus")
            ->setGagne(5)
            ->setJoue(20)
            ->setPerdu(5)
            ->setNul(10)
            ->setPoints();

        $this->em->persist($club1);
        $this->em->flush();

        $club2= new ClassementClub();
        $club2->setClub("Inter")
            ->setGagne(10)
            ->setJoue(20)
            ->setPerdu(5)
            ->setNul(5)
            ->setPoints();

        $this->em->persist($club2);
        $this->em->flush(); */

        //$clubs = $this->repository1->printAll();
        $clubs = $paginator->paginate($this->repository1->printAll($recherche),
            $request->query->getInt('page',1),
            10
        );


        return $this->render('Classement/ClassementClub.html.twig', [
            'clubs' => $clubs,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/Classement/ClassementPronostiqueur", name="classementpronostiqueur")
     * @return Response
     */
    public function indexPronostiqueurs(): Response{
        /* $p1 = new Pronostiqueur();
         $p1->setNom('Daniel Dupont')
             ->setNbrePronostiques(300)
             ->setNbreReussite(250)
             ->setTauxReussite();
         $this->em->persist($p1);
         $this->em->flush();

         $p2 = new Pronostiqueur();
         $p2->setNom('Camille Leboeuf')
             ->setNbrePronostiques(300)
             ->setNbreReussite(200)
             ->setTauxReussite();
         $this->em->persist($p2);
         $this->em->flush();

         $p3 = new Pronostiqueur();
         $p3->setNom('Abu Zirkoff')
             ->setNbrePronostiques(350)
             ->setNbreReussite(280)
             ->setTauxReussite();
         $this->em->persist($p3);
         $this->em->flush();*/

        $pronostiqueurs = $this->repository2->printAll();

        return $this->render('Classement/ClassementPronostiqueur.html.twig' , [
            'pronostiqueurs' => $pronostiqueurs
        ]);
    }

}