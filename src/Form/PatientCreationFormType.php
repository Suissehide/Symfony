<?php

namespace App\Form;

use App\Entity\Patient;
use App\Form\AnnexeType;
use App\Form\AtelierType;
use App\Form\EntretienType;
use App\Form\TelephoniqueType;
use App\Form\RendezVousType;
use App\Form\BCVsType;
use App\Form\InfosType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Serializer\Mapping\ClassMetadata;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PatientCreationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('observ', TextareaType::class, array('label' => 'Observations diverses'))
            ->add('date', DateType::class, array(
                'label' => 'Date de naissance',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => [
                    'class' => 'datepicker',
                ],
            ))
            ->add('nom', TextType::class, array('label' => 'Nom'))
            ->add('prenom', TextType::class, array('label' => 'Prénom'))

            ->add('tel1', TextType::class, array('label' => 'Téléphone 1'))
            ->add('tel2', TextType::class, array('label' => 'Téléphone 2'))
            ->add('sexe', ChoiceType::class, array(
                'label' => 'Sexe',
                'choices' => array(
                    '' => '',
                    'Mr' => 'homme',
                    'Mme' => 'femme',
                ),
            ))
            ->add('distance', ChoiceType::class, array(
                'label' => 'Distance d\'habitation',
                'choices' => array(
                    '' => '',
                    'Hors Gironde' => 'Hors Gironde',
                    'CUB' => 'CUB',
                    'Gironde' => 'Gironde',
                ),
            ))
            ->add('etude', ChoiceType::class, array(
                'label' => 'Niveau d\'étude',
                'choices' => array(
                    '' => '',
                    'Primaire' => 'primaire',
                    'Secondaire' => 'secondaire',
                    'Universitaire' => 'universitaire',
                ),
            ))
            ->add('profession', ChoiceType::class, array(
                'label' => 'Profession',
                'choices' => array(
                    '' => '',
                    'Artisans, commerçants et chefs d\'entreprises' => 'Artisans, commerçants et chefs d\'entreprises',
                    'Cadres et professions intellectuelles supérieures' => 'Cadres et professions intellectuelles supérieures',
                    'Professions intermédiaires' => 'Professions intermédiaires',
                    'Employés' => 'Employés',
                    'Ouvriers' => 'Ouvriers',
                    'Agriculteur' => 'Agriculteur',
                    'Mère au foyer' => 'Mère au foyer',
                ),
            ))
            ->add('activite', ChoiceType::class, array(
                'label' => 'Activité actuelle',
                'choices' => array(
                    '' => '',
                    'Actif' => 'Actif',
                    'Retraité' => 'Retraité',
                    'RMI/RSA' => 'RMI/RSA',
                    'Sans emploi' => 'Sans emploi',
                    'Chômage' => 'Chômage',
                    'Arrêt maladie' => 'Arrêt maladie',
                    'Invalidité' => 'Invalidité',
                    'Autre' => 'Autre',
                ),
            ))
            ->add('diagnostic', ChoiceType::class, array(
                'label' => 'Diagnostic médical',
                'choices' => array(
                    '' => '',
                    'AOMI' => 'AOMI',
                    'AVC' => 'AVC',
                    'CORONAROPATHIE' => 'CORONAROPATHIE',
                    'PREVENTION' => 'PREVENTION',
                ),
            ))
            ->add('dedate', DateType::class, array(
                'label' => 'Date d\'entrée',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => [
                    'class' => 'datepicker',
                ],
            ))
            ->add('orientation', ChoiceType::class, array(
                'label' => 'Orientation',
                'choices' => array(
                    '' => '',
                    'Venue spontanée' => 'Venue spontanée',
                    'Orientation pro santé ext hôpital' => 'Orientation pro santé ext hôpital',
                    'Orientation pro santé au cours hospit' => 'Orientation pro santé au cours hospit',
                    'Orientation pro santé en Cs' => 'Orientation pro santé en Cs',
                    'NS' => 'NS',
                ),
            ))
            ->add('etpdecision', ChoiceType::class, array(
                'label' => 'ETP Décision',
                'choices' => array(
                    '' => '',
                    'Oui' => 'oui',
                    'Non' => 'non',
                ),
            ))
            ->add('precisions', ChoiceType::class, array(
                'label' => 'Précision non inclusion',
                'choices' => array(
                    '' => '',
                    'Absence de besoins éducatifs' => 'Absence de besoins éducatifs',
                    'Refus' => 'Refus',
                    'Absence de critères médicaux d\'inclusion' => 'Absence de critères médicaux d\'inclusion',
                    'Prise en charge des besoins quotidiens' => 'Prise en charge des besoins quotidiens',
                    'Problèmes médicaux à régler' => 'Problèmes médicaux à régler',
                    'Problème de santé' => 'Problème de santé',
                    'Manque de motivation' => 'Manque de motivation',
                    'Indisponibilité' => 'Indisponibilité',
                    'Distance  d\'habitation' => 'Distance d\'habitation',
                    'Troubles cognitifs' => 'Troubles cognitifs',
                    'Troubles psychiatriques' => 'Troubles psychiatriques',
                    'Transport' => 'Transport',
                    'Barrière de la langue' => 'Barrière de la langue',
                    'NS' => 'NS',
                ),
            ))
            ->add('progetp', ChoiceType::class, array(
                'label' => 'Type de programme',
                'choices' => array(
                    '' => '',
                    'HRCV' => 'HRCV',
                    'AOMI' => 'AOMI',
                    'AOMI + HRCV' => 'AOMI + HRCV',
                ),
            ))
            ->add('precisionsperso', TextareaType::class, array('label' => 'Précision contenu personnalisé'))

            ->add('motif', ChoiceType::class, array(
                'label' => 'Motif d\'arrêt de programme',
                'choices' => array(
                    '' => '',
                    'Absence besoins éducatifs' => 'Absence besoins éducatifs',
                    'Refus' => 'Refus',
                    'Plus de besoin/Fin de parcours' => 'Plus de besoin/Fin de parcours',
                    'Souhait arrêt' => 'Souhait arrêt',
                    'Perdu de vue' => 'Perdu de vue',
                    'Absence de critères médicaux d\'inclusion' => 'Absence de critères médicaux d\'inclusion',
                    'Prise en charge besoins quotidiens' => 'Prise en charge besoins quotidiens',
                    'Problèmes médicaux à régler' => 'Problèmes médicaux à régler',
                    'Problème de santé' => 'Problème de santé',
                    'Manque de motivation' => 'Manque de motivation',
                    'Indisponibilité' => 'Indisponibilité',
                    'Distance d\'habitation' => 'Distance d\'habitation',
                    'Troubles cognitifs' => 'Troubles cognitifs',
                    'Troubles psychiatriques' => 'Troubles psychiatriques',
                    'Transport' => 'Transport',
                    'Barrière de la langue' => 'Barrière de la langue',
                    'Déménagement' => 'Déménagement',
                    'Décès' => 'Décès',
                    'NS' => 'NS',
                ),
            ))
            ->add('etp', ChoiceType::class, array(
                'label' => 'Point final parcours ETP',
                'choices' => array(
                    '' => '',
                    'Atelier information' => 'Atelier information',
                    'BCVs' => 'BCVs',
                    'DE' => 'DE',
                    'M3' => 'M3',
                    'M12' => 'M12',
                    'Renf1' => 'Renf1',
                    'Renf2' => 'Renf2',
                    'Atelier' => 'Atelier',
                    'Consultation' => 'Consultation',
                    'Entretien individuel' => 'Entretien individuel',
                    'Suivi téléphonique' => 'Suivi téléphonique',
                ),
            ))
            ->add('dentree', DateType::class, array(
                'label' => 'Date de sortie  ',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'attr' => [
                    'class' => 'datepicker',
                ],
                'required' => false,
            ))

            ->add('rendezVous', CollectionType::class, array(
                'entry_type' => RendezVousType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'by_reference' => false,
            ))
            ->add('entretiens', CollectionType::class, array(
                'entry_type' => EntretienType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'by_reference' => false,
            ))
            ->add('ateliers', CollectionType::class, array(
                'entry_type' => AtelierType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'by_reference' => false,
            ))
            ->add('telephoniques', CollectionType::class, array(
                'entry_type' => TelephoniqueType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'by_reference' => false,
            ))
            ->add('bcvs', CollectionType::class, array(
                'entry_type' => BCVsType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'by_reference' => false,
            ))
            ->add('infos', CollectionType::class, array(
                'entry_type' => InfosType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'by_reference' => false,
            ))
            ->add('annexes', CollectionType::class, array(
                'entry_type' => AnnexeType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ))
            ->add('validation', SubmitType::class, array('label' => 'Enregistrer'))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }
}
