<?php

namespace Cfp\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cfp\UserBundle\Entity\Biography;
use Cfp\UserBundle\Form\BiographyType;

/**
 * Biography controller.
 *
 */
class BiographyController extends Controller
{
    /**
     * Lists all Biography entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->get('security.context')->getToken()->getUser();

        $entities = $em->getRepository('CfpUserBundle:Biography')->findByUser($user);

        return $this->render('CfpUserBundle:Biography:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Biography entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Biography();
        $form = $this->createForm(new BiographyType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $user = $this->get('security.context')->getToken()->getUser();
            $entity->setDtAdded(new \DateTime());
            $entity->setDtUpdated(new \DateTime());
            $entity->setUser($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('biography_show', array('id' => $entity->getId())));
        }

        return $this->render('CfpUserBundle:Biography:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Biography entity.
     *
     */
    public function newAction()
    {
        $entity = new Biography();
        $form   = $this->createForm(new BiographyType(), $entity);

        return $this->render('CfpUserBundle:Biography:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Biography entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CfpUserBundle:Biography')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Biography entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CfpUserBundle:Biography:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Biography entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CfpUserBundle:Biography')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Biography entity.');
        }

        $editForm = $this->createForm(new BiographyType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CfpUserBundle:Biography:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Biography entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CfpUserBundle:Biography')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Biography entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new BiographyType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('biography_edit', array('id' => $id)));
        }

        return $this->render('CfpUserBundle:Biography:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Biography entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CfpUserBundle:Biography')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Biography entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('biography'));
    }

    /**
     * Creates a form to delete a Biography entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
