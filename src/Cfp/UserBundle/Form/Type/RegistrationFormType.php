<?php

namespace Cfp\UserBundle\Form\Type;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationFormType extends BaseType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('username', null, array(
            'label' => 'Username',
            'widget_suffix' => "<span id='usercheck'>&nbsp;</span>")
        );
        $builder->add('email', null, array(
            'label' => 'Email address',
            'widget_suffix' => "&nbsp;<span id='gravatar'>&nbsp;</span>&nbsp;<span id='emailcheck'>&nbsp;</span> ")
        );
        $builder->add('plainPassword', 'repeated', array(
            'type' => 'password',
            'first_options' => array(
                'widget_suffix' => "&nbsp;<span id='strength'></span>",
            ),
            'first_name' => 'Password',
            'second_name' => 'Again')
        );

        /*
        $builder->add('fullname', null, array('label' => "Full name"));
        $builder->add('twitterHandle', null, array(
                                                   'widget_addon' => array('type' => 'prepend', 'text' => '@'),
                                                   'label' => 'your twitter handle',
                                                   'required' => false));
        */
    }

    public function getName()
    {
        return 'cfp_user_registration';
    }
}
