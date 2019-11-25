<?php

namespace App\Form;

use App\Entity\ProductAvis;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductAvisType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('name',TextType::class)
            ->add('note',ChoiceType::class,[
                'choices'=>[
                    '1'=>1,
                    '2'=>2,
                    '3'=>3,
                    '4'=>4,
                    '5'=>5,
                    '6'=>6,
                    '7'=>7,
                    '8'=>8,
                    '9'=>9,
                    '10'=>10,
                ]
            ])
            ->add('categorie')
            ->add('description')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductAvis::class,
        ]);
    }
}
