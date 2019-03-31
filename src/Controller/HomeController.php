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
use App\Repository\UtilisateurRepository;
use App\Repository\PronostiqueurRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(ObjectManager $om, Request $request, UtilisateurRepository $repository){
        $user = new Utilisateur();
        $form   = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);

        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository(Utilisateur::class)
        ;

        $listUser = $repository->findAll();
        foreach($listUser as $us){
            if ($form->get('Login')->getData()==$us->getLogin() && $form->get('Password')->getData()==$us->getPassword()){
                return $this->render('home/homeConnected.html.twig');
             }

        }

        $aux  = $repository->printAll();
        $count=1;
        $listTopUser= [];
        foreach($aux as $element){
            array_push($listTopUser,$element);
            if($count==5){
                break;
            }

            $count++;
        }


        return $this->render('home/home.html.twig',array('form'=>$form->createView(),'listTopUser'=>$listTopUser));

    }


    /**
     * @Route("/register")
     */
    public function register(ObjectManager $om, Request $request, UtilisateurRepository $repository)
    {
        $user = new Utilisateur();
        $form = $this->createForm(UserForm::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            // On enregistre notre objet $advert dans la base de données, par exemple
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->render('home/home.html.twig', array('form' => $form->createView()));

        }

        return $this->render('home/homeRegister.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/dayprono")
     */
    public function dayProno(){
        return $this->render('home/dayprono.html.twig');
    }
}