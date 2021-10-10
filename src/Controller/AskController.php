<?php

//src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 

class AskController extends AbstractController{

    /**
     * *@Route("/ask", name="ask")
     */
    public function viewAsk(){

        //create a modal 
        $model=array();

        //identify a twig template
        $view='ask.html.twig';

   return $this->render($view, $model);
    }

}
?>