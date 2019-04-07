<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 31/03/2019
 * Time: 20:19
 */

namespace App\Controller;

use App\Controller\ForAllController;
use App\Entity\Utilisateur;
use App\Repository\JeuRepository;
use App\Repository\UtilisateurJeuxRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Persistence\ObjectManagerDecorator;
use PhpParser\Node\Expr\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class Historique extends ForAllController {
    private $pronostiqueurs5;
    private $repository;
    /**
     * @var UtilisateurJeuxRepository
     */
    private $uj;


    /**
     * @var UtilisateurRepository
     */
    private $u;


    public function __construct(UtilisateurJeuxRepository $uj, UtilisateurRepository $u, UtilisateurRepository $repository)
    {
        $this->uj = $uj;
        $this->u=$u;
        $this->repository = $repository;
        $this->pronostiqueurs5 = $this->renderForAll($repository);
    }

    /**
     * @Route("/Historique",name="historique_index")
     * @param UtilisateurJeuxRepository $rep
     * @return Array
     */
    public function HistoriqueIndex(UtilisateurJeuxRepository $rep) : Response {


        $res = $rep->getThemAll();
        return $this->render('historique/historique.html.twig', [
            'all' => $res,
            'pronostiqueurs5' => $this->pronostiqueurs5
        ]);
    }

    /**
     * @Route("/profil/{id}",name="profile.show")
     * @param UtilisateurRepository $u
     * @return Response
     */
    public function showProfil($id) : Response  {

        $user=$this->u->find($id);
        return $this->render("Utilisateur/myProfile.html.twig", [
            //envoyer mon utilisateur à ma vue
            'util' => $user,
            'pronostiqueurs5' => $this->pronostiqueurs5
        ]);
    }



}