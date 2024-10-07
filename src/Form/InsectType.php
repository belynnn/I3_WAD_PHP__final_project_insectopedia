<?php

namespace App\Form;

use App\Entity\Insect;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\File;

class InsectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameInsect', TextType::class, [
                'label' => 'form.nameInsect',
            ])
            ->add('species')
            ->add('description')
            ->add('kingdom')
            ->add('phylum')
            ->add('class')
            ->add('orderInsect')
            ->add('family')
            ->add('describedBy')
            ->add('yearDescribed')
            ->add('activityTime')
            ->add('lifeCycle')
            ->add('image', FileType::class, [
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
            'data_class' => Insect::class,
        ]);
    }
}
