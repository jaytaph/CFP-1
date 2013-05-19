<?php

namespace Cfp\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BiographyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description')
            ->add('biography')
//            ->add('dtAdded')
//            ->add('dtUpdated')
//            ->add('path')
//            ->add('user')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cfp\UserBundle\Entity\Biography'
        ));
    }

    public function getName()
    {
        return 'cfp_userbundle_biographytype';
    }
}
