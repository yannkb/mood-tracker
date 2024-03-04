<?php

namespace App\Form;

use App\Entity\Mood;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MoodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mood', ChoiceType::class, [
                'choices'  => [
                    'Rad' => 'rad',
                    'Good' => 'good',
                    'Meh' => 'meh',
                    'Bad' => 'bad',
                    'Awful' => 'awful',
                ],
                'label' => 'How are you?',
            ])
            ->add('activities', ChoiceType::class, [
                'choices'  => [
                    'family' => 'family',
                    'friends' => 'friends',
                    'date' => 'date',
                    'exercise' => 'exercise',
                    'sport' => 'sport',
                    'relax' => 'relax',
                    'movies' => 'movies',
                    'gaming' => 'gaming',
                    'reading' => 'reading',
                    'cleaning' => 'cleaning',
                    'sleep early' => 'sleep early',
                    'eat healthy' => 'eat healthy',
                    'shopping' => 'shopping',
                ],
                'label' => 'What have you been up to?',
                'multiple' => true
            ])
            ->add('comment', TextareaType::class, [
                'label' => 'Add a comment'
            ])
            ->add('createdAt', HiddenType::class)
            ->add('userId', HiddenType::class)
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mood::class,
        ]);
    }
}
