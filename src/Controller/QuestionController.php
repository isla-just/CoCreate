<?php

//src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 

class QuestionController extends AbstractController{
    /**
     * *@Route("/question/{id}", name="question")
     */

    public function viewQuestion(){

        //create a modal 
        $model=array();

        //identify a twig template
        $view='question.html.twig';

   return $this->render($view, $model);
    }

}
?>