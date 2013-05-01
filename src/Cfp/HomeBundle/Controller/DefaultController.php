<?php

namespace Cfp\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homeAction()
    {
        return $this->render('CfpHomeBundle:Default:home.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('CfpHomeBundle:Default:about.html.twig');
    }

}
