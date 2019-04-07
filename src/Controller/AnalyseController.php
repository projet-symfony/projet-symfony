<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */
namespace App\Controller;
use App\Repository\JeuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
class AnalyseController extends AbstractController
{
    private $em;
    private $repository;
    private $repjeu;
    public function __Construct( UtilisateurRepository $repository,JeuRepository $repjeu, ObjectManager $em){
        $this->em = $em;
        $this->repository = $repository;
        $this->repjeu=$repjeu;
    }


    /**
     * @Route("/Analyse/Analyse" ,name="Analyse")
     */
    public function analysePage(Request $request){
        $pronostiqueurs5 = $this->repository->printJustFive();
        $jeu = $this->repjeu->find($request->query->get('id'));
        return $this->render('/Analyse/Analyse.html.twig', [
            'pronostiqueurs5' => $pronostiqueurs5 ,'jeu' => $jeu
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
        $pronostiqueurs5 = $this->repository->printJustFive();
        return $this->render('article/read.html.twig', [
            'pronostiqueurs5' => $pronostiqueurs5
        ]);
    }
}