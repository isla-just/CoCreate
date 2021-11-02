<?php

//src/Controller/HomeController.php
namespace App\Controller;

use App\Entity\Question;
use App\Entity\UserProfile;
use App\Form\QuestionType;
// use App\Repository\QuestionRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route; 
use Symfony\Component\Security\Core\Security;
// use Symfony\Component\HttpFoundation\Session\Session;

class AskController extends AbstractController{

    /**
     * @Route("/ask", name="ask", methods={"GET", "POST"})
     */

    public function newQuestion(Request $request): Response
    {

        $user = $this->getUser();
        if($user == null){
           return $this->redirectToRoute('app_login');
        }
        
         $question = new Question();
        // $send_id=$request->getSession()->get(Security::LAST_USERNAME);
        // $get_id=$question->getUserId(UserProfile::$send_id);

        // $session = new Session();
        // $session->start();

        $form = $this->createForm(QuestionType::class, $question);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $question = $form->getData(); //getData gets the data from the form

            // $id=$question->getUserId();
            $profileUrl=$form->get('imageUrl')->getData();

            if($profileUrl){
                //creating a unique url
                $fileName=pathinfo($profileUrl->getClientOriginalName(), PATHINFO_FILENAME);
                $newFileName=time() . '.' . $profileUrl->guessExtension();        
            
                try{
                    $profileUrl->move('../public/questions/',$newFileName
                    );
                }catch(FileException $e){

                }//end of try catch
            }

            //upload to database
            $question->setImageUrl($newFileName);
            // $question->setUserId(UserProfil)

            //upload to database
            // $question->setUserId(UserProfile::class,$id);

            //manages the creation of the new user using the Entity in our DB
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($question);
            $entityManager->flush();

            $id=$question->getId();

            return $this->redirect("question/" . $id);


        }

        //    $model=array();  

        return $this->renderForm('ask.html.twig', [
            'question' => $question,
            'form' => $form,
        ]);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Question::class,
        ]);
    }

}
?>