<?php

namespace Cfp\VoteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CfpVoteBundle:Default:index.html.twig', array('name' => $name));
    }
}
