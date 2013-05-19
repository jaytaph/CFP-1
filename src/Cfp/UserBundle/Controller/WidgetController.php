<?php

namespace Cfp\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cfp\UserBundle\Entity\Biography;
use Cfp\UserBundle\Form\BiographyType;

class WidgetController extends Controller
{

    public function controlPanelAction() {
        return $this->render('CfpUserBundle:Widget:controlpanel.html.twig');
    }
}
