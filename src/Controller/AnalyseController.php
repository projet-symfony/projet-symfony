<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */
namespace App\Controller;

use App\Controller\ForAllController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Persistence\ObjectManager;

class AnalyseController extends ForAllController
{
    private $em;
    private $repository;
    private $pronostiqueurs5;
    public function __Construct( UtilisateurRepository $repository,  ObjectManager $em){
        $this->em = $em;
        $this->repository = $repository;
        $this->pronostiqueurs5 = $this->renderForAll($repository);
    }


    /**
     * @Route("/Analyse/Analyse" ,name="Analyse")
     */
    public function analysePage(){


        return $this->render('/Analyse/Analyse.html.twig', [
            'pronostiqueurs5' => $this->pronostiqueurs5
        ]);
    }
    /**
     * @Route("/article/{slug}")
     */
    public function readAll($slug){
        var_dump($slug);
        return new Response('For All Article');
    }
    public function read($slug){

        return $this->render('article/read.html.twig', [
            'pronostiqueurs5' => $this->pronostiqueurs5
        ]);
    }
}