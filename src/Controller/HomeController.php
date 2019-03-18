<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */

namespace App\Controller;

use App\Form\UserForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Article;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(){
        return $this->render('home.html.twig');
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