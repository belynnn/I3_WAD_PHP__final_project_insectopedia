<?php

namespace App\Form;

use App\Entity\Observation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ObservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameInsect', TextType::class, [
                'label' => 'Nom de l\'insecte',
                'attr' => ['placeholder' => 'Entrez le nom de l\'insecte']
            ])
            ->add('primaryColorInsect', TextType::class, [
                'label' => 'Couleur primaire',
                'attr' => ['placeholder' => 'noir, rouge et blanc, ...']
            ])
            ->add('developmentStageInsect', TextType::class, [
                'label' => 'Stade',
                'attr' => ['placeholder' => 'larve, adulte, ...']
            ])
            ->add('organismHost', TextType::class, [
                'label' => 'Organisme hôte',
                'attr' => ['placeholder' => 'plante, inconnu, ...']
            ])
            ->add('description')
            ->add('weather', TextType::class, [
                'label' => 'Météo',
                'attr' => ['placeholder' => 'nuageux, ensoleillé, ...']
            ])
            ->add('temperature', TextType::class, [
                'label' => 'Température',
                'attr' => ['placeholder' => '21, 15.5, ...']
            ])
            ->add('rateHumidity', TextType::class, [
                'label' => 'Taux d\'humidité',
                'attr' => ['placeholder' => '21, 15.5, ...']
            ])
            ->add('longitude', TextType::class, [
                'attr' => ['placeholder' => '4.1526']
            ])
            ->add('latitude', TextType::class, [
                'attr' => ['placeholder' => '50.1526']
            ])
            ->add('habitat', TextType::class, [
                'attr' => ['placeholder' => 'forêt, ville, ...']
            ])
            ->add('dateObservationRegister', DateType::class, [
                'label' => 'Date d\'enregistrement',
                'widget' => 'single_text', // Utilisation du widget single_text pour un champ date simple
                'data' => new \DateTime(), // Valeur par défaut à la date actuelle
                'attr' => ['readonly' => true], // Rendre le champ non modifiable si souhaité
            ])
            ->add('dateObservation', DateType::class, [
                'label' => 'Date d\'observation',
            ])
            ->add('photo', FileType::class, [
                'label' => 'Photo de l\'insecte (JPG ou PNG)',
                'mapped' => false, // Ce champ n'est pas lié à l'entité directement
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '2M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader une image valide (JPG/PNG)',
                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Observation::class,
        ]);
    }
}