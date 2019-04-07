<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */
namespace App\Controller;
use App\Entity\Jeu;
use App\Entity\Utilisateur;
use App\Repository\EquipeRepository;
use App\Repository\JeuRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
class AnalyseController extends AbstractController
{



    /**
     * @Route("/Analyse/Analyse" ,name="Analyse")
     */
    public function analysePage(UtilisateurRepository $repository, JeuRepository $repository2, EquipeRepository $repository3, ObjectManager $em, Request $request){

        $pronostiqueurs5 = $repository->printJustFive();

        $equipe1 = $repository3->find($request->query->get('equipe1'));
        $equipe2 = $repository3->find($request->query->get('equipe2'));

        return $this->render('/Analyse/Analyse.html.twig', [
            'pronostiqueurs5' => $pronostiqueurs5, 'equipe1' => $equipe1, 'equipe2' => $equipe2
        ]);
    }

}