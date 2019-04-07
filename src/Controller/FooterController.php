<?php
/**
 * Created by PhpStorm.
 * User: YRSL
 * Date: 3/29/2019
 * Time: 1:07 PM
 */

namespace App\Controller;
use App\Entity\Contacte;
use App\Repository\UtilisateurRepository;
use App\Repository\ContacteRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class FooterController extends AbstractController
{

    private $repository ;
    private $em ;
    private  $repoutil;

    public function __construct(contacteRepository $repository,UtilisateurRepository $repoutil ,ObjectManager $em)
     {
         $this->repository = $repository;
          $this->repoutil=$repoutil;
          $this->em = $em;
     }


    /**
     * @Route("/footer/info" ,name="info")
     */
    public function infoPage(){
        $pronostiqueurs5 = $this->repoutil->printJustFive();
        return $this->render('/footer/info.html.twig', [
        'pronostiqueurs5' => $pronostiqueurs5
        ]);
    }
    /**
     * @Route("/footer/contacte" ,name="contacte")
     */
    public function contactePage(){
        $pronostiqueurs5 = $this->repoutil->printJustFive();
        return $this->render('/footer/contacte.html.twig', [
            'pronostiqueurs5' => $pronostiqueurs5
        ]);
    }
    /**
     * @Route("/footer/footer", name="footer")
     */


    public function  index(Request $request){
    $pronostiqueurs5 = $this->repoutil->printJustFive();
        $name = $request->get("nom");
        $message = $request->get("msg");

        $email = $request->get("mail");
        $pseudoForum = $request->get("pseudo");
        $sujet = $request->get("sujet");
        $contacte=new Contacte();
        $contacte->setEmail($email)
          ->setMessage($message)
          ->setName($name)
          ->setPseudoForum($pseudoForum)
          ->setSujet($sujet);
        $this->em->persist($contacte);
        $this->em->flush();
        return $this->render('footer/message.html.twig',["name"=>$name,
        "message"=>"ttttttttt",'pronostiqueurs5' => $pronostiqueurs5]);
    }


    /**
     * @Route("/footer/plan" ,name="plan")
     */
    public function planPage(){
        $pronostiqueurs5 = $this->repoutil->printJustFive();
        return $this->render('/footer/plan.html.twig', [
            'pronostiqueurs5' => $pronostiqueurs5
        ]);
    }
    /**
     * @Route("/footer/mention" ,name="mention")
     */
    public function mentionPage(){
        $pronostiqueurs5 = $this->repoutil->printJustFive();
        return $this->render('/footer/mention.html.twig', [
            'pronostiqueurs5' => $pronostiqueurs5
        ]);
    }


    /**
     * @Route("/footer/FAQ" ,name="FAQ")
     */
    public function FAQPage(){
        $pronostiqueurs5 = $this->repoutil->printJustFive();
        return $this->render('/footer/FAQ.html.twig', [
            'pronostiqueurs5' => $pronostiqueurs5
        ]);
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