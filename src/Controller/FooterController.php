<?php
/**
 * Created by PhpStorm.
 * User: YRSL
 * Date: 3/29/2019
 * Time: 1:07 PM
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class FooterController extends AbstractController
{
    /**
     * @Route("/footer/info" ,name="info")
     */
    public function infoPage(){
        return $this->render('/footer/info.html.twig');
    }
    /**
     * @Route("/footer/contacte" ,name="contacte")
     */
    public function contactePage(){
        return $this->render('/footer/contacte.html.twig');
    }
    /**
     * @Route("/footer/plan" ,name="plan")
     */
    public function planPage(){
        return $this->render('/footer/plan.html.twig');
    }
    /**
     * @Route("/footer/mention" ,name="mention")
     */
    public function mentionPage(){
        return $this->render('/footer/mention.html.twig');
    }


    /**
     * @Route("/footer/FAQ" ,name="FAQ")
     */
    public function FAQPage(){
        return $this->render('/footer/FAQ.html.twig');
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