<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 06/04/2019
 * Time: 04:49
 */

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\Common\Persistence\ObjectManager;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ForAllController extends AbstractController
{
    private $repository;

    public function __construct()
    {

    }

    public function renderForAll(UtilisateurRepository $repository){
        $this->repository = $repository;
        $pronostiqueurs = $this->repository->printJustFive();

        return $pronostiqueurs;

    }


}