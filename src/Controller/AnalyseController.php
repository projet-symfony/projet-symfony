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
       $equipe1 = $this->repository->AllEquipe('idEquipe1',$request->query->get('Equipe1'));
        $equipe2 = $this->repository->AllEquipe('idEquipe2',$request->query->get('Equipe2'));
        return $this->render('Analyse/Analyse.html.twig', [
            'jeu' => $jeu, 'equipe1'=>$equipe1, 'equipe2'=>$equipe2]);

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