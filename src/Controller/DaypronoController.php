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

class DaypronoController extends AbstractController
{
    /**
     * @Route("/dayprono")
     */
    public function homepage(){
        return $this->render('dayprono.html.twig');
    }
}