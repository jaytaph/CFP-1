<?php

namespace Cfp\TalkBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TalkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('abstract')
            ->add('remark')
            ->add('speakers')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Cfp\TalkBundle\Entity\Talk'
        ));
    }

    public function getName()
    {
        return 'cfp_talkbundle_talktype';
    }
}
