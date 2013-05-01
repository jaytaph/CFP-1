<?php

namespace Cfp\ConferenceBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConferenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('dtCreated')
            ->add('dtStart')
            ->add('dtEnd')
            ->add('cfpStart')
            ->add('cfpEnd')
            ->add('description')
            ->add('geoLong')
            ->add('geoLat')
            ->add('tag')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cfp\ConferenceBundle\Entity\Conference'
        ));
    }

    public function getName()
    {
        return 'cfp_conferencebundle_conferencetype';
    }
}
