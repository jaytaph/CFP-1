<?php

namespace Cfp\HomeBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        $menu->setCurrent($this->container->get('request')->getRequestUri());

        $menu->addChild('Home', array('route' => 'cfp_home_homepage'));
        $menu->addChild('About', array('route' => 'cfp_home_about'));

        if ($this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.context')->getToken()->getUser();

            // Add machines to the menu as a dropdown
            $menu->addChild('Abstracts', array('route' => 'cfp_home_about'))->setAttribute('divider_prepend', true);
            $menu->addChild('Conferences', array('route' => 'cfp_home_about'));
            $menu->addChild('Submissions', array('route' => 'cfp_home_about'));
//            foreach ($user->getMachines() as $machine) {
//                $menu['Machines']->addChild($machine, array('route' => 'box_environment', 'routeParameters' => array("machine_id" => $machine->getId())));
//            }

            $gravatar = $this->container->get('gravatar.api');
            $menu->addChild($user->getUserName()." <img src='".$gravatar->getUrl($user->getEmail(), 20)."'>")->setAttribute('raw', true);

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
