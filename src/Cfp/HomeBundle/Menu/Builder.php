<?php

namespace Cfp\HomeBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $em = $this->container->get('doctrine')->getManager();

        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        $menu->setCurrent($this->container->get('request')->getRequestUri());

        $menu->addChild('Home', array('route' => 'cfp_home_homepage'));
        $menu->addChild('About', array('route' => 'cfp_home_about'));

        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.context')->getToken()->getUser();

            // @TODO: Just fetch count, not all records!
            $talks = $em->getRepository('CfpTalkBundle:Talk')->findAll();
            $biographies = $em->getRepository('CfpUserBundle:Biography')->findAll();
            $submissions = $em->getRepository('CfpConferenceBundle:Submission')->findAll();
            $conferences = $em->getRepository('CfpConferenceBundle:Conference')->findAll();

            $menu->addChild('Conferences')->setAttribute('divider_prepend', true)->setAttribute('dropdown', true);
            $menu->getChild('Conferences')->addChild('Submitted conferences <span class="badge badge-success">'.count($conferences).'</span>', array('route' => 'conference'));
            $menu->getChild('Conferences')->addChild('Open CFPs <span class="badge badge-success">'.count($conferences).'</span>', array('route' => 'conference'));

            $menu->addChild('Talks')->setAttribute('divider_prepend', true)->setAttribute('dropdown', true);
            $menu->getChild('Talks')->addChild('Abstracts <span class="badge badge-success">'.count($talks).'</span>', array('route' => 'talk'));
            $menu->getChild('Talks')->addChild('Submissions <span class="badge badge-success">'.count($submissions).'</span>', array('route' => 'cfp_home_about'));
            $menu->getChild('Talks')->addChild('Biographies <span class="badge badge-success">'.count($biographies).'</span>', array('route' => 'biography'));

            $gravatar = $this->container->get('gravatar.api');
            $menu->addChild($user->getFullName()." <img src='".$gravatar->getUrl($user->getEmail(), 20)."'>")->setAttribute('raw', true)->setAttribute('divider_prepend', true);
            $menu->addChild('Logout', array('route' => 'fos_user_security_logout'));
        } else {
            $menu->addChild('Login', array('route' => 'fos_user_security_login'));
        }

        return $menu;
    }
}
