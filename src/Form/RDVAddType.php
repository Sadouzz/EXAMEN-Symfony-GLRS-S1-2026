<?php

namespace App\Form;

use App\Entity\Patient;
use App\Entity\RDV;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RDVAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeRDV')
            ->add('typeConsultation')
            ->add('typePrestation')
            ->add('patient', EntityType::class, [
                'class' => Patient::class,
                'choice_label' => 'id',
            ])
            ->add('btnSaveRDV', SubmitType::class, [
                "label" => "Enregistrer",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => RDV::class,
        ]);
    }
}
