<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AnalyseController extends AbstractController
{
    /**
     * @Route("/Analyse/Analyse" ,name="Analyse")
     */
    public function analysePage(){
        return $this->render('/Analyse/Analyse.html.twig');
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

