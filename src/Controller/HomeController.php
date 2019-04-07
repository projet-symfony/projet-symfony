<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */

namespace App\Controller;
<<<<<<< HEAD

=======
>>>>>>> cd064be782e79ff470b978cee1f5d8d814e27b19
use App\Controller\ForAllController;
use App\Entity\Jeu;
use App\Entity\Utilisateur;
use App\Form\UserForm;
use App\Repository\JeuRepository;
use App\Repository\UtilisateurRepository;
use App\Repository\PronostiqueurRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends ForAllController
{

    private $repository ;
    private $pronostiqueurs5;
    private $repository2;



    private $em;
    public function __construct(JeuRepository $repository, ObjectManager $em, UtilisateurRepository $repository2)
    {
        $this->repository = $repository;
        $this->em = $em;
        $this->repository2 = $repository2;
        $this->pronostiqueurs5 = $this->renderForAll($repository2);
    }
    /**
     * @Route("/")
     */
    public function homepage(ObjectManager $om, Request $request, UtilisateurRepository $repository, JeuRepository $repository2){
        $user = new Utilisateur();
        $form   = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Utilisateur::class)
        ;

<<<<<<< HEAD




=======
>>>>>>> cd064be782e79ff470b978cee1f5d8d814e27b19
        $pronostiqueurs5 = $this->repository2->printJustFive();

        $repository2 = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Jeu::class)
        ;
        $listMatch = $repository2->findAllMatch();
<<<<<<< HEAD



=======
      
>>>>>>> cd064be782e79ff470b978cee1f5d8d814e27b19
        $listUser = $repository->findAll();
        foreach($listUser as $us){
            if ($form->get('Login')->getData()==$us->getLogin() && $form->get('Password')->getData()==$us->getPassword()){
                return $this->render('home/homeConnected.html.twig',[
<<<<<<< HEAD
                    'pronostiqueurs5' => $this->pronostiqueurs5,
                    'match' => $listMatch
=======
                    'pronostiqueurs5' => $this->pronostiqueurs5
>>>>>>> cd064be782e79ff470b978cee1f5d8d814e27b19
                ]);
            }

        }



        return $this->render('home/home.html.twig', [
<<<<<<< HEAD

            'pronostiqueurs5' => $this->pronostiqueurs5,
            'form'=>$form->createView(),
            'match' => $listMatch
=======
            'pronostiqueurs5' => $pronostiqueurs5,
            'form'=>$form->createView(),
            'match' => $listMatch

>>>>>>> cd064be782e79ff470b978cee1f5d8d814e27b19
        ]);

    }


    /**
     * @Route("/register")
     */
    public function register(ObjectManager $om, Request $request, UtilisateurRepository $repository)
    {
        $repository2 = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Utilisateur::class)
        ;



        $user = new Utilisateur();
        $form = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // On enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->render('home/home.html.twig', [
                'form' => $form->createView(),
                'pronostiqueurs5' => $this->pronostiqueurs5
            ]);

        }

        return $this->render('home/homeRegister.html.twig', [
            'pronostiqueurs5' => $this->pronostiqueurs5,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/dayprono")
     */
    public function dayProno(){
        $repository2 = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Utilisateur::class)
        ;



        $jeu = $this->repository->printAll();
        return $this->render('home/dayprono.html.twig', [
            'pronostiqueurs5' => $this->pronostiqueurs5,
            'jeu' => $jeu]);
    }
}