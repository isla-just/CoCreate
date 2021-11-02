<?php

//src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 

use App\Entity\Question;

class HomeController extends AbstractController{

    /**
     * *@Route("/", name="index")
     */
    public function viewHome(){

        $user = $this->getUser();
        if($user == null){
           return $this->redirectToRoute('app_login');
        }

            //using the Entity & Doctrine to get our Database data
            $questions = $this->getDoctrine()
             ->getRepository(Question::class)
             ->findAll(); 
             
             //findAll() function to get all of our data - will implement sorting functionality later
             //findBy(array(feeling => 'happy', id => '1')) - to compare more than one field

            //create a model
            $model = array('questions' => $questions);

            //return with twig template, specifying the view and data sent to the view
            return $this->render('home.html.twig', $model);
    }

}
?>