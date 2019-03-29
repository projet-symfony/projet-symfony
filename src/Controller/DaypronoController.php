<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */

namespace App\Controller;
use App\Entity\Jeu;
use App\Repository\JeuRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DaypronoController extends AbstractController
{


    private $repository ;
    private $em;
    public function __construct(JeuRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }




    /**
     * @Route("/dayprono")
     */
    public function homepage(){

        $jeu = $this->repository->printAll();
        return $this->render('dayprono.html.twig', [
            'jeu' => $jeu]);

    }
}