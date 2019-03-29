<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */

namespace App\Controller;
use App\Repository\JeuRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $repository ;
    private $em;
    public function __construct(JeuRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }




    /**
     * @Route("/")
     */
    public function homepage(){

        $jeu = $this->repository->printAll();
        return $this->render('home.html.twig', [
            'jeu' => $jeu]);

    }



}