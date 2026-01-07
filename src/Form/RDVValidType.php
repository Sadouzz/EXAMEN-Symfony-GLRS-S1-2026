<?php

namespace App\Form;

use App\Entity\RDV;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RDVValidType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateFixee', DateTimeType::class, [
                'label' => 'Date du rendez-vous',
                'widget' => 'single_text',
            ])
            ->add('btnValider', SubmitType::class, [
                'label' => 'Valider le RDV',
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
              'data_class' => RDV::class
        ]);
    }
}
