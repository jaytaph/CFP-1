<?php

namespace Cfp\ConferenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class WidgetController extends Controller
{
    public function conferencesAction()
    {
        return $this->render('CfpConferenceBundle:Widget:conferences.html.twig');
    }
}
