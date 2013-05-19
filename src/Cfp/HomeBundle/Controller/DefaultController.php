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

    public function mainTipAction() {
        $tip = $this->_findBestMainTip();
        if (empty($tip)) {
            return new Response("");
        }
        return $this->render('CfpHomeBundle:Widget:maintip.html.twig', array('tip' => $tip));
    }

    protected function _findBestMainTip()
    {
        if (! $this->container->get('security.context')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return "It looks like you aren't logged in yet. Why don't you login and explore the site?";
        }

        $user = $this->get('security.context')->getToken()->getUser();
        if (count($user->getBiographies()) == 0) {
            return "It looks like you haven't got any biographies. Why don't you add one so you can submit to conferences?";
        }

        if (count($user->getTalks()) == 0) {
            return "It looks like you haven't got any talks. Why don't you add some so you can submit them to conferences?";
        }

        return "";
    }

    public function tipAction()
    {
        $em = $this->getDoctrine()->getManager();

        switch (rand(1,2)) {
            case 1:
                $tip = "Did you know that our site is still in beta?";
                break;
            case 2:
                $tip = "Did you know that this site has been created by the <a href='http://dutchweballiance.nl'><img style='height:25px' src='/img/logo_dwa.png'></a>?";
                break;
            default:
                $users = $em->getRepository('CfpUserBundle:User')->getCount();
                $talks = $em->getRepository('CfpTalkBundle:Talk')->getCount();

                $tip = "Did you know that there are currently <b>".$users."</b> registered users and have a total of <b>".$talks."</b> talks?";
                break;
        }
        return $this->render('CfpHomeBundle:Widget:tip.html.twig', array('tip' => $tip));
    }

}
