<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/03/2019
 * Time: 14:49
 */

namespace App\Controller;

use App\Controller\ForAllController;
use App\Entity\RechercheClassementEquipe;
use App\Entity\RechercheClassementUtilisateur;
use App\Entity\Utilisateur;
use App\Entity\Equipe;
use App\Form\RechercheClassementEquipeType;
use App\Form\RechercheClassementUtilisateurType;
use App\Repository\EquipeRepository;
use App\Repository\UtilisateurRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ClassementController extends ForAllController
{
    private $pronostiqueurs5;
    private $em;
    private $repository1;
    private $repository2;
    private $repository3;

    public function __Construct(EquipeRepository $repository1, UtilisateurRepository $repository2,  UtilisateurRepository $repository3, ObjectManager $em){
        $this->em = $em;
        $this->repository1 = $repository1;
        $this->repository2 = $repository2;
        $this->repository3 = $repository3;
        $this->pronostiqueurs5 = $this->renderForAll($repository3);
    }

    /**
     * @Route("/Classement/ClassementClub", name="classementclub")
     * @return Response
     */
    public function indexClubs(PaginatorInterface $paginator,Request $request):Response{

        $recherche = new RechercheClassementEquipe();
        $form = $this->createForm(RechercheClassementEquipeType::class, $recherche);
        $form->handleRequest($request);

        $clubs = $paginator->paginate($this->repository1->printAll($recherche),
            $request->query->getInt('page',1),
            15
        );




        return $this->render('Classement/ClassementClub.html.twig', [
            'clubs' => $clubs,
            'pronostiqueurs5' => $this->pronostiqueurs5,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/Classement/ClassementPronostiqueur", name="classementpronostiqueur")
     * @return Response
     */
    public function indexPronostiqueurs(PaginatorInterface $paginator2,Request $request): Response{
        //$recherche = new RechercheClassementUtilisateur();
        //$form = $this->createForm(RechercheClassementUtilisateurType::class, $recherche);
        //$form->handleRequest($request);

        $pronostiqueurs = $paginator2->paginate($this->repository2->printAll(/*$recherche*/),
            $request->query->getInt('page',1),
            20
        );



        return $this->render('Classement/ClassementPronostiqueur.html.twig', [
            'pronostiqueurs' => $pronostiqueurs,
            'pronostiqueurs5' => $this->pronostiqueurs5
        ]);


    }

}