<?php

namespace App\Form;

use App\Entity\Answer;
use App\Entity\UserProfile;
use App\Entity\Question;

// use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
// use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
// use Symfony\Component\Form\CallBackTransformer;

class AnswerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('user',EntityType::class, array('class' => UserProfile::class,'choice_label' => 'id'

            ))
            ->add('question',EntityType::class, array('class' => Question::class,'choice_label' => 'id'))
            
            ->add('comment', TextType::class)
            ->add('submit', SubmitType::class, ['label' => "."])
;
      
    }

    
}
?>