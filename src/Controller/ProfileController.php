<?php

//src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 

use App\Entity\UserProfile;

class ProfileController extends AbstractController{
//curly braces are wildcard 
    /**
     * *@Route("/profile/{id}", name="view_profile")
     */
    public function viewProfile($id = null){//defualt id value

        //error handling when id is not supplied
        if($id==null){
            return $this -> redirectToRoute('index');
        }
        //access the wildcard
        $user_id=(int) $id;

        //using the entity and doctrine to get your database data
        $user=$this->getDoctrine()
            ->getRepository(UserProfile::class)
            -> find ($user_id);

            //create a model
            $model = array('user' => $user);

            //return with twig template, specifying the view and data sent to the view
            return $this->render('profile.html.twig', $model);
    }
}
?>