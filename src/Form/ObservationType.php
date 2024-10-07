<?php

namespace App\Form;

use App\Entity\Observation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ObservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameInsect', TextType::class, [
                'label' => 'Nom de l\'insecte',
                'attr' => ['placeholder' => 'Entrez le nom de l\'insecte']
            ])
            ->add('primaryColorInsect')
            ->add('developmentStageInsect')
            ->add('organismHost')
            ->add('weather')
            ->add('temperature')
            ->add('rateHumidity')
            ->add('longitude')
            ->add('latitude')
            ->add('habitat')
            ->add('dateObservationRegister')
            ->add('dateObservation')
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