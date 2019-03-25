<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11/02/2019
 * Time: 10:36
 */

namespace App\Controller;

use App\Entity\Match;
use App\Entity\Vote;
use App\Repository\VoteRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DaypronoController extends AbstractController
{
    private $repository ;
    private $em;
    public function __construct(VoteRepository $repository, ObjectManager $em)
{
   $this->repository = $repository;
   $this->em = $em;
}

    /**
     * @Route("/dayprono")
     */
    public function homepage(){
      //  $vote = new Vote();
      //  $vote->setNbVote(3)
       //     ->setIdMatch(2)
       //     ->setVote1(100)
         //   ->setVote2(100)
          //  ->setVoteN(15);
       // $this->em->persist($vote);
        //$this->em->flush();
        $votes = $this->repository->printAll();
            return $this->render('dayprono.html.twig', [
                'vote' => $votes]);
        //$vote=$this->getDoctrine()->getRepository(Vote::class)->findAll();
        //$match=$this->getDoctrine()->getRepository(Match::class)->findAll();
        //return $this->render('dayprono.html.twig',array('vote'=>$vote,'match'=>$match));
    }
}