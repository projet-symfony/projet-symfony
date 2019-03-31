<?php
/**
 * Created by PhpStorm.
 * User: YRSL
 * Date: 3/29/2019
 * Time: 1:07 PM
 */

namespace App\Controller;


use App\Entity\Contacte;
use App\Repository\ContacteRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class FooterController extends AbstractController
{

    private $repository ;
    private $em;

    public function __construct(contacteRepository $repository, ObjectManager $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }
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
     * @Route("/footer/footer", name="footer")
     */
     public function  index(Request $request){
         $name = $request->get("nom");
         $message = $request->get("msg");
         $email = $request->get("mail");
         $pseudoForum = $request->get("pseudo");
         $sujet = $request->get("sujet");
         $contacte=new Contacte();
         $contacte->setAddressemai($email)
             ->setMessage($message)
             ->setNom($name)
             ->setPseudoforum($pseudoForum)
             ->setSujet($sujet);
         $this->em->persist($contacte);
         $this->em->flush();
         return $this->render('message.html.twig',["name"=>$name,
             "message"=>"ttttttttt"]);
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