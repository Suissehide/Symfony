<?php

namespace App\Form;

use App\Entity\Telephonique;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TelephoniqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', DateType::class, array(
                'label' => 'Date prévue',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => [
                    'class' => 'datepicker',
                ],
            ))
            ->add('type', ChoiceType::class, array(
                'label' => 'Type',
                'choices' => array(
                    '' => '',
                    'Diet' => 'Diet',
                    'Renf1' => 'Renf1',
                    'Renf2' => 'Renf2',
                    'Reactu DE' => 'Reactu DE',
                    'Tabac' => 'Tabac',
                    'Psy' => 'Psy',
                    'Diabète' => 'Diabete',
                    'HTA' => 'HTA',
                    'Autre' => 'Autre',
                ),
                'required'   => false,
            ))
            ->add('etat', ChoiceType::class, array(
                'label' => 'A-t-il eu lieu ?',
                'choices' => array(
                    '' => '',
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                ),
                'required'   => false,
            ))
            ->add('motifRefus', TextType::class, array(
                'label' => 'Motif de non réponse',
                'required'   => false,
            ))
            // ->add('patient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Telephonique::class,
        ]);
    }
}
