<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */

namespace App\Controller;
use App\Entity\Utilisateur;
use App\Form\UserForm;
use App\Repository\JeuRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $repjeu ;
    private $repository2;
    private $em;
    public function __construct(JeuRepository $repjeu, UtilisateurRepository $repository2, ObjectManager $em)
    {
        $this->repjeu = $repjeu;
        $this->repository2 = $repository2;
        $this->em = $em;
    }
    /**
     * @Route("/")
     */
    public function homepage(ObjectManager $om, Request $request, UtilisateurRepository $repository, JeuRepository $repjeu){
        $user = new Utilisateur();
        $form   = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Utilisateur::class)
        ;



        $pronostiqueurs5 = $this->repository2->printJustFive();


        $listUser = $repository->findAll();
        foreach($listUser as $us){
            if ($form->get('Login')->getData()==$us->getLogin() && $form->get('Password')->getData()==$us->getPassword()){
                $jeu = $this->repjeu->printAll();
                return $this->render('home/homeConnected.html.twig',[
                    'pronostiqueurs5' => $pronostiqueurs5,'jeu'=>$jeu
                ]);
            }

        }

        /*
        $repository2 = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Pronostiqueur::class)
        ;
        $listprono = $repository2->printAll();
        */
        $jeu = $this->repjeu->printAll();
        return $this->render('home/home.html.twig', [
            'form' => $form->createView(),
            'pronostiqueurs5' => $pronostiqueurs5, 'jeu' => $jeu]);


    }


    /**
     * @Route("/register")
     */
    public function register(ObjectManager $om, Request $request, UtilisateurRepository $repository,JeuRepository $repjeu)
    {
        $repository2 = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Utilisateur::class)
        ;

        $pronostiqueurs5 = $repository2->printJustFive();

        $user = new Utilisateur();
        $form = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // On enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $jeu = $this->repjeu->printAll();
            return $this->render('home/home.html.twig', [
                'form' => $form->createView(),
                'pronostiqueurs5' => $pronostiqueurs5, 'jeu' => $jeu]);

        }
        $jeu = $this->repjeu->printAll();
        return $this->render('home/homeRegister.html.twig', [
            'pronostiqueurs5' => $pronostiqueurs5,
            'form' => $form->createView(), 'jeu' => $jeu
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

        $pronostiqueurs5 = $repository2->printJustFive();

        $jeu = $this->repjeu->printAll();
        return $this->render('home/dayprono.html.twig', [
            'pronostiqueurs5' => $pronostiqueurs5,
            'jeu' => $jeu]);
    }
}