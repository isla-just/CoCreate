<?php

//src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 

use App\Entity\UserProfile;
use App\Form\UserEditType;


class ProfileController extends AbstractController{
//curly braces are wildcard 
    /**
     * *@Route("/profile/{id}", name="view_profile", methods={"GET", "POST"})
     */
    public function viewProfile(Request $request, UserProfile $userProfile, $id = null):Response
    {//defualt id value

        $user = $this->getUser();
        if($user == null){
           return $this->redirectToRoute('app_login');
        }

                //access the wildcard
                $user_id=(int) $id;

        //error handling when id is not supplied
        if($id==null){
            return $this -> redirectToRoute('index');
        }

        // $userProfile = new UserProfile();
        $form = $this->createForm(UserEditType::class, $userProfile);
        $form->handleRequest($request);

        $error="";

        if($form->isSubmitted() && $form->isValid()){

            //checking if email is already in use
            $get_email = $this->getDoctrine()->getRepository(UserProfile::class)->findBy(array('email' => $userProfile->getEmail()));
            //manages the edit of the new user using the Entity in our DB
            $entityManager = $this->getDoctrine()->getManager();

            
                                // //setting the profile picture localization
                $id=$userProfile->getId();
                $get_pic = $this->getDoctrine()->getRepository(UserProfile::class)->findBy(array('profilePic' => $userProfile->getProfilePic()));
                //manages the edit of the new user using the Entity in our DB
                $profileUrl=$form->get('profilePic')->getData();
                                  
                if($profileUrl!=$get_pic){
                //creating a unique url
                $fileName=pathinfo($profileUrl->getClientOriginalName(), PATHINFO_FILENAME);
                $newFileName=time() . '_' . $id . '.' . $profileUrl->guessExtension();        
                                                          
                                                                try{
                                                                    $profileUrl->move('../public/profiles/',$newFileName
                                                                    );
                                                                }catch(FileException $e){
                                    
                                                                }//end of try catch

                                                                                                                            //upload to database
                    $userProfile->setProfilePic($newFileName);
                }else{
                    $userProfile->setProfilePic($get_pic);
                }
                                    
                $entityManager->persist($userProfile);                                     
            $entityManager->flush();

            
            return $this->redirect($user_id);
        }

        //using the entity and doctrine to get your database data
        $user=$this->getDoctrine()
            ->getRepository(UserProfile::class)
            -> find ($user_id);


            //getting all of the users
            $allUsers=$this->getDoctrine()
            ->getRepository(UserProfile::class)
            -> findAll();

            return $this->renderForm('profile.html.twig', [
                'user' => $user,
                'form' => $form,
                'allUsers'=>$allUsers

            ]);
    
    }

     /**
     * *@Route("/ban/{id}", name="ban", methods={"GET", "POST"})
     */
    public function banAdmin(Request $request, UserProfile $userProfile, $id = null) {

        $admin_id = (int) $id;

        $Admin=$this->getDoctrine()
        ->getRepository(UserProfile::class)
        ->findBy(['access' => "0"]);

            $entityManager = $this->getDoctrine()->getManager();

            $access = $userProfile->getAccess();
            $userProfile->setAccess(1);
            $entityManager->persist($userProfile);
            $entityManager->flush();

            return $this->redirectToRoute("index");
    }

     /**
     * *@Route("/unban/{id}", name="unban", methods={"GET", "POST"})
     */
    public function unbanAdmin(Request $request, UserProfile $userProfile, $id = null) {

        $admin_id = (int) $id;

        $Admin=$this->getDoctrine()
        ->getRepository(UserProfile::class)
        ->findBy(['access' => "1"]);

            $entityManager = $this->getDoctrine()->getManager();

            $access = $userProfile->getAccess();
            $userProfile->setAccess(0);
            $entityManager->persist($userProfile);
            $entityManager->flush();

            return $this->redirectToRoute("index");
    }
}
?>