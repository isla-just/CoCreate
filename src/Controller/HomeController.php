<?php

//src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 

class HomeController extends AbstractController{

    /**
     * *@Route("/", name="index")
     */
    public function viewHome(){

        //create a modal 
        $model=array();

        //identify a twig template
        $view='home.html.twig';

   return $this->render($view, $model);
    }

}
?>