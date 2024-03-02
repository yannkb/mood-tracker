<?php

namespace App\Form;

use App\Entity\Mood;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MoodType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('createdAt', HiddenType::class)
            ->add('comment')
            ->add('mood', ChoiceType::class, [
                'choices'  => [
                    'Rad' => 'rad',
                    'Good' => 'good',
                    'Meh' => 'meh',
                    'Bad' => 'bad',
                    'Awful' => 'awful',
                ]
            ])
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