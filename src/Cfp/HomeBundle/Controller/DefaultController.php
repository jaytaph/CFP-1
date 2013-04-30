<?php

namespace Cfp\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $conferences = $em->getRepository('CfpConferenceBundle:Conference')->getLatest(10);

        return $this->render('CfpHomeBundle:Default:home.html.twig', array(
            'conferences' => $conferences,
        ));
    }

    public function aboutAction()
    {
        return $this->render('CfpHomeBundle:Default:about.html.twig');
    }

}
