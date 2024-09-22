<?php

namespace App\Form;

use App\Entity\Insect;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

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
            ->add('yearDescribed', null, [
                'widget' => 'single_text',
            ])
            ->add('activity')
            ->add('cycle')
            ->add('image')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Insect::class,
        ]);
    }
}
