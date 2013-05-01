<?php

namespace Cfp\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UserController extends Controller
{

    /**
     * @return Response
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function checkuserAction() {
        // Only Ajax requests are allowed
        if (! $this->getRequest()->isXmlHttpRequest()) {
            throw new AccessDeniedHttpException();
        }

        $username = $this->getRequest()->get('username');
        if (empty($username)) {
            throw new AccessDeniedHttpException();
        }

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("CfpUserBundle:User")->findOneByUsernameCanonical(strtolower($username));

        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("status" => $user == null ? "free" : "taken")));
        return $response;
    }

    /**
     * @return Response
     * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
     */
    public function checkemailAction() {
        // Only Ajax requests are allowed
        if (! $this->getRequest()->isXmlHttpRequest()) {
            throw new AccessDeniedHttpException();
        }

        $email = $this->getRequest()->get('email');
        if (empty($email)) {
            throw new AccessDeniedHttpException();
        }

        $em = $this->getDoctrine()->getManager();
        $email = $em->getRepository("CfpUserBundle:User")->findOneByEmailCanonical(strtolower($email));

        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("status" => $email == null ? "free" : "taken")));
        return $response;
    }

}
