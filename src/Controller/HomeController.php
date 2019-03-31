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
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;

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
            if ($form->get('Pseudo')->getData()==$us->getLogin() && $form->get('Password')->getData()==$us->getPassword()){
                return $this->render('homeConnected.html.twig');
             }

        }

        return $this->render('home.html.twig',array('form'=>$form));
    }

    /**
     * @Route("/{slug}")
     */

    public function read($slug)
    {
        return $this->render('home.html.twig');
    }

}