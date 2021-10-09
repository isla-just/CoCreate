<?php

//src/Controller/LoginController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 

// use App\Entity\User;

class RegisterController extends AbstractController{
//curly braces are wildcard 
    /**
     * *@Route("/register", name="register")
     */

    public function viewRegister(){

        //create a modal 
        $model=array();

        //identify a twig template
        $view='register.html.twig';

   return $this->render($view, $model);
    }

}
?>