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

            // @TODO: Just fetch count, not all talks
            $talks = $em->getRepository('CfpTalkBundle:Talk')->findAll();

            // Add machines to the menu as a dropdown
            $menu->addChild('Abstracts <span class="badge badge-success">'.count($talks).'</span>', array('route' => 'talk'))->setAttribute('divider_prepend', true);

            // @TODO: Just fetch count, not all conferences
            $conferences = $em->getRepository('CfpConferenceBundle:Conference')->findAll();

            $menu->addChild('Conferences <span class="badge badge-success">'.count($conferences).'</span>', array('route' => 'conference'));

            // @TODO: Just fetch count, not all conferences
            $submissions = $em->getRepository('CfpConferenceBundle:Submission')->findAll();
            $menu->addChild('Submissions <span class="badge badge-success">'.count($submissions).'</span>', array('route' => 'cfp_home_about'));
//            foreach ($user->getMachines() as $machine) {
//                $menu['Machines']->addChild($machine, array('route' => 'box_environment', 'routeParameters' => array("machine_id" => $machine->getId())));
//            }

            $gravatar = $this->container->get('gravatar.api');
            $menu->addChild($user->getUserName()." <img src='".$gravatar->getUrl($user->getEmail(), 20)."'>")->setAttribute('raw', true)->setAttribute('divider_prepend', true);

//            <p class="navbar-text">{{ app.user.fullname }} <img src="{{ gravatar(app.user.email, 25) }}"></p>
//            <li><p class="navbar-text">{{ app.user.fullname }} <img src="{{ gravatar(app.user.email, 25) }}"></p></li>
//            $user = $this->container->get('security.context')->getToken()->getUser();
//            $menu->addChild('Profile', array('route' => 'fos_user_security_logout'));
            $menu->addChild('Logout', array('route' => 'fos_user_security_logout'));
        } else {
            $menu->addChild('Login', array('route' => 'fos_user_security_login'));
        }

        return $menu;
    }
}
