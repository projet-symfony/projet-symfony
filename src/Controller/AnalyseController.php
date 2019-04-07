<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */
namespace App\Controller;
use App\Repository\JeuRepository;
use App\Repository\StatsRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class AnalyseController extends AbstractController
{
    private $repository ;

    private $em;

    public function __construct(JeuRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;

        $this->em = $em;
    }
    /**
     * @Route("/Analyse/Analyse" ,name="Analyse")
     */
    public function analysePage(Request $request){

        $jeu = $this->repository->find($request->query->get('id'));
        ////$stats=$this->repstat->
        return $this->render('Analyse/Analyse.html.twig', [
            'jeu' => $jeu]);

    }
    /**
     * @Route("/article/{slug}")
     */
    public function readAll($slug){
        var_dump($slug);
        return new Response('For All Article');
    }
    public function read($slug){
        return $this->render('article/read.html.twig');
    }
}