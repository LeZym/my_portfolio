<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DownloadCVType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['class' => 'form-control mb-3']
            ])
            ->add('motif', ChoiceType::class, [
                'label' => 'Motif du téléchargement',
                'choices' => [
                    'Recrutement' => 'recrutement',
                    'Stage/Alternance' => 'stage',
                    'Autre' => 'autre'
                ],
                'attr' => ['class' => 'form-select mb-3']
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Télécharger le CV',
                'attr' => ['class' => 'btn btn-primary']
            ]);
    }
}