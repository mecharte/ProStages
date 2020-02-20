<?php

namespace App\Form;

use App\Entity\Stage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Form\EntrepriseType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Formation;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description')
            ->add('email')
            ->add('nomEntreprise',EntrepriseType::class)
            ->add('formations', EntityType::class, [
                'class' => Formation::class,
                'choice_label' => function(Formation $formations){
                  return $formations->getNomCourt().' - '.$formations->getNomLong();
                },
                'multiple' => true,
                'expanded' => true
              ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
