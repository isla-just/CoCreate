<?php

//src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route; 

use App\Entity\Question;
use App\Entity\Answer;
use App\Entity\UserProfile;
use App\Form\AnswerType;
class QuestionController extends AbstractController{
    
     /**
     * *@Route("/question/{id}", name="question")
     */

    public function viewQuestion(Request $request, Request $formRequest, $id = null){

      $user = $this->getUser();
      if($user == null){
         return $this->redirectToRoute('app_login');
      }

        //access the wildcard
        $question_id=(int) $id;

        //error handling when id is not supplied
        if($id==null){
           return $this -> redirectToRoute('index');
        }

        $answer = new Answer();

        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($formRequest);

                    //if it is a POST
                    if($request->isXmlHttpRequest()) { //if we are receiving a HTTP request
                      //get the POST data - id
                      $answerId = $_POST['id'];
                      $upvotes = 0; //default
                      $type=$_POST['type'];

                      if($type=="up"){
                        $entityManager = $this->getDoctrine()->getManager();
                        //get the mood that was liked
                        $answer = $entityManager->getRepository(Answer::class)->find($answerId);
                        
                        //update the likes to the moods current count - using the getter
                        $upvotes = $answer->getUpvotes();
                        //update our entity using the setter
                        $answer->setUpvotes($upvotes + 1);
        
                        $entityManager->flush();

                        $repCount = 0;

                        $userId = $_POST["userId"];
                        $entityManager2 = $this->getDoctrine()->getManager();
                        $rep = $entityManager2->getRepository(UserProfile::class)->find($userId);
                        $repCount = $rep->getReputation();
                        $rep->setReputation($repCount + 1);
                        $entityManager2->flush();

                        //create defalt variable for rep count

                        $user = new UserProfile();

                        $rep = 0; //default
                        $entityManager2 = $this->getDoctrine()->getManager();
                        //get the comment that was liked
                        $userId=$answerId->getUser()->getId();
                        $user = $entityManager2->getRepository(UserProfile::class)->find($userId);

                                   //update the likes to the moods current count - using the getter
                                   $rep = $user->getReputation();
                                   //update our entity using the setter
                                   $user->setReputation($rep + 1);
                                   $entityManager2->flush();
        
                        return $upvotes + 1;
                      }else{

                        $downvotes = 0; //default

                      $entityManager = $this->getDoctrine()->getManager();
                      //get the mood that was liked
                      $answer = $entityManager->getRepository(Answer::class)->find($answerId);
                      //update the likes to the moods current count - using the getter
                      $downvotes = $answer->getDownvotes();
                      //update our entity using the setter
                      $answer->setDownvotes($downvotes + 1);
      
                      $entityManager->flush();

                        //decreasing the reputation
                      $repCount = 0;

                      $userId = $_POST["userId"];
                      $entityManager2 = $this->getDoctrine()->getManager();
                      $rep = $entityManager2->getRepository(UserProfile::class)->find($userId);
                      $repCount = $rep->getReputation();
                      $rep->setReputation($repCount - 1);
                      $entityManager2->flush();
                      }


    
      
                  }

                  //adding a response
        if($form->isSubmitted() && $form->isValid()){

            $answerdata = $form->getData(); //getData gets the data from the form
            // $answer->setQuestion($question_id);
            //manages the creation of the new user using the Entity in our DB
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($answerdata);
            $entityManager->flush();

                  // return $this->redirect("question/" . $id);
        }

          //using the entity and doctrine to get your database data
          $question=$this->getDoctrine()
          ->getRepository(Question::class)
          ->find($question_id);

          return $this->renderForm('question.html.twig', [
            'question' => $question,
            'answer' => $answer,
            'form' => $form,
            // 'id'=>$question_id
        ]);
        //works
        return $this->redirect("question/" . $question_id);

    }

    //route pinning a post

    /**
     * *@Route("/question/{id}/pin", name="question_pin")
     */

    public function pin(Request $request, $id = null){

        //access the wildcard
        $question_id=(int) $id;

        //error handling when id is not supplied
        if($id==null){
           return $this -> redirectToRoute('index');
        }

            $entityManager = $this->getDoctrine()->getManager();

            $answer=$entityManager->getRepository(Answer::class)->find($id);

            $answer->setPinned(1);
            $entityManager->persist($answer);
            $entityManager->flush();
            
            return $this->redirect("question/" . $id);
        }


     /**
     * *@Route("/question/{id}/delete", name="delete_post")
     */
    public function deletePost(Request $request, $id = null): Response
    {

              //access the wildcard
              $question_id=(int) $id;

              if($id==null){
                return $this -> redirectToRoute('index');
             }

              $question=$this->getDoctrine()
              ->getRepository(Question::class)
              ->find($question_id );

              $success=true;

              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->remove($question);
              $entityManager->flush();

        return $this->redirectToRoute('index', ["success" =>$success], Response::HTTP_SEE_OTHER);
    }
 
     /**
     * *@Route("/question/{id}/deleteResponse", name="delete_response")
     */
    public function deleteResponse(Request $request, $id = null): Response
    {
              //access the wildcard
              $answer_id=(int) $id;

              if($id==null){
                return $this -> redirectToRoute('index');
             }

              $answer=$this->getDoctrine()
              ->getRepository(Answer::class)
              ->find($answer_id);

              $entityManager = $this->getDoctrine()->getManager();
              $entityManager->remove($answer);
              $entityManager->flush();

        return $this->redirectToRoute('index', [], Response::HTTP_SEE_OTHER);
    }

}
?>