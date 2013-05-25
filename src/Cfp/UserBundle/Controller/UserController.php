<?php

namespace Cfp\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UserController extends Controller
{

    /**
     * Ajax controller: returns a number of users (id, email, full name) based on the given pattern.
     * For security reasons, it will only return when we have very few matches.
     *
     * @return Response
     */
    public function findUserAction() {
        // Only Ajax requests are allowed
        if (! $this->getRequest()->isXmlHttpRequest()) {
            throw new AccessDeniedHttpException();
        }

        $pattern = $this->getRequest()->get('pattern');

        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository("CfpUserBundle:User")->findUsersByPattern($pattern, 10);

        $response = new Response();
        $response->setStatusCode(200);
        $response->setContent(json_encode(array("users" => $users)));
        return $response;
    }

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
