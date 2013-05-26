<?php

namespace Cfp\ConferenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WidgetController extends Controller
{
    public function conferencesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('CfpConferenceBundle:Conference');
        $total_count = $repo->getCount();
        $open_count = $repo->getOpenCfpsCount();

        return $this->render('CfpConferenceBundle:Widget:conferences.html.twig', array(
            'open_count' => $open_count,
            'total_count' => $total_count,
            ));
    }
}
