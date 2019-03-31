<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 15/03/2019
 * Time: 14:49
 */

namespace App\Controller;


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


class ClassementController extends AbstractController
{
    private $em;
    private $repository1;
    private $repository2;

    public function __Construct(EquipeRepository $repository1, UtilisateurRepository $repository2,ObjectManager $em){
        $this->em = $em;
        $this->repository1 = $repository1;
        $this->repository2 = $repository2;
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
            10
        );


        return $this->render('Classement/ClassementClub.html.twig', [
            'clubs' => $clubs,
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
            10
        );

        return $this->render('Classement/ClassementPronostiqueur.html.twig', [
            'pronostiqueurs' => $pronostiqueurs,
            //'form' => $form->createView()
        ]);


    }

}