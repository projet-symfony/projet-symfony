<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(Request $request, ObjectManager $objectManager){
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {


            $objectManager = $this->getDoctrine()->getManager();
            $objectManager->persist($user);
            $objectManager->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('home.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}")
     */

    public function read($slug){
        return $this->render('home.html.twig');
    }

}