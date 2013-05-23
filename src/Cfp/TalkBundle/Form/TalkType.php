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
            ->add('speaker', 'collection', array(
                    'mapped' => false,

                    'type' => 'text',

                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,

                    'widget_add_btn' => array('label' => "extra speaker", 'attr' => array('class' => 'btn addtokenInputter')),
                    'show_legend' => true, // dont show another legend of subform
                    'options' => array( // options for collection fields
                        //'class' => 'Cfp\UserBundle\Entity\User',
                        'widget_remove_btn' => array('label' => "remove speaker", 'attr' => array('class' => 'btn')),
                        'widget_control_group' => false,
                        'widget_controls' => false,
                        'label' => false,
                        'attr' => array('class' => 'ajax_speaker_ac input-large'),
                     )));
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
