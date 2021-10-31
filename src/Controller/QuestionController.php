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
     * *@Route("/question/{id}", name="question", methods={"GET", "POST"})
     */

    public function viewQuestion(Request $request, $id = null){

        //access the wildcard
        $question_id=(int) $id;

        //error handling when id is not supplied
        if($id==null){
           return $this -> redirectToRoute('index');
        }

        $answer = new Answer();

        $form = $this->createForm(AnswerType::class, $answer);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $answerdata = $form->getData(); //getData gets the data from the form
            // $answer->setQuestion($question_id);
            //manages the creation of the new user using the Entity in our DB
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($answerdata);
            $entityManager->flush();

            // $pinned=$answer->setPinned(false)


            return $this->redirectToRoute("index");
        }

          //using the entity and doctrine to get your database data
          $question=$this->getDoctrine()
          ->getRepository(Question::class)
          ->find($question_id);

        //    //using the entity and doctrine to get your database data
        //    $answer=$this->getDoctrine()
        //    ->getRepository(Answer::class)
        //    ->find($question_id);

          return $this->renderForm('question.html.twig', [
            'question' => $question,
            // 'answer' => $answer,
            'form' => $form,
            // 'id'=>$question_id
        ]);


   return $this->render($view, $model);
    }

}
?>