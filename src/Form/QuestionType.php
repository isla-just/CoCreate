<?php

namespace App\Form;

use App\Entity\UserProfile;

// use App\Entity\Question;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
// use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
// use Symfony\Component\Form\CallBackTransformer;

class QuestionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('userId',EntityType::class, array('data_class' => null,'empty_data' => '', 'class' => UserProfile::class,'choice_label' => 'id'))
            
            ->add('imageUrl', FileType::class)
            ->add('questionText', TextareaType::class)
            ->add('submit', SubmitType::class, ['label' => "Post question"])
            ->add('community', ChoiceType::class, [
                'choices'=>[
                    'Select community' => null,
                    'Graphic design'=>'Graphic design',
                    'UX design'=>'UX design',
                    'Illustration'=>'Illustration',
                ],
            ]);
      
    }

    
}
?>