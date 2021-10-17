<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', TextType::class,[
            
                'label'=>false
            ])
            ->add('cinema', TextType::class,[
            
                'label'=>false
            ])
            ->add('film', TextType::class,[
            
                'label'=>false
            ])
            ->add('nombredetickets', TextType::class,[
            
                'label'=>false
            ])

            ->add('submit', SubmitType::class,[
                'label'=> "payer",
                'attr' => [
                    
                    'class'=>'btn w-100 text-white btn-lg bg-dark',
                ]
            ])
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
