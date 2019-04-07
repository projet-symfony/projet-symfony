<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 07/04/2019
 * Time: 19:23
 */

namespace App\Controller;

use App\Controller\ForAllController;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class newsController extends ForAllController
{
    private $pronostiqueurs5;
    private $repository;

    public function __construct(UtilisateurRepository $repository)
    {
        $this->repository = $repository;
        $this->pronostiqueurs5 = $this->renderForAll($repository);
    }

    /**
     * @Route("/News/Lyon",name="news1")
     */
    public function News1() : Response {

        return $this->render('News/news1.html.twig',[
            'pronostiqueurs5' => $this->pronostiqueurs5
        ]);
    }

    /**
     * @Route("/News/verres",name="news2")
     */
    public function News2() : Response {

        return $this->render('News/news2.html.twig',[
            'pronostiqueurs5' => $this->pronostiqueurs5
        ]);
    }

    /**
     * @Route("/News/FabienMercadal",name="news3")
     */
    public function News3() : Response {

        return $this->render('News/news3.html.twig',[
            'pronostiqueurs5' => $this->pronostiqueurs5
        ]);
    }
}