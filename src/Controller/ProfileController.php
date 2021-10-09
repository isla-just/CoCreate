<?php

//src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 

use App\Entity\User;

class ProfileController extends AbstractController{
//curly braces are wildcard 
    /**
     * *@Route("/profile/{id}", name="view_frofile")
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

        //create a modal 
        $model=array();

        //identify a twig template
        $view='profile.html.twig';

        // foreach($users as $user){
        //     if($user_id == $user->getId()){
        //         $model['user']=$user;
        //     }
        // }

   return $this->render($view, $model);
    }

       /**
     * *@Route("/test", name="test")
     */
    public function test(){
        return new Response(
            '<html><body><h1>Tester</h1></body></html>'
        );
    }
}
?>