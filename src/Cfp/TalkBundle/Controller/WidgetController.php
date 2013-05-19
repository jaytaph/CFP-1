<?php

namespace Cfp\TalkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cfp\TalkBundle\Entity\Talk;
use Cfp\TalkBundle\Form\TalkType;

class WidgetController extends Controller
{

    public function talksAction()
    {
        return $this->render('CfpTalkBundle:Widget:talks.html.twig');
    }

}
