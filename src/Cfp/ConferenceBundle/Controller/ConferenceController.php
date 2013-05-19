<?php

namespace Cfp\ConferenceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cfp\ConferenceBundle\Entity\Conference;
use Cfp\ConferenceBundle\Form\ConferenceType;

/**
 * Conference controller.
 *
 */
class ConferenceController extends Controller
{
    /**
     * Lists all Conference entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        // @TODO: FindAllConferencesWhereAdmin
        $entities = $em->getRepository('CfpConferenceBundle:Conference')->findAll();

        return $this->render('CfpConferenceBundle:Conference:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Conference entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Conference();
        $form = $this->createForm(new ConferenceType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('conference_show', array('id' => $entity->getId())));
        }

        return $this->render('CfpConferenceBundle:Conference:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Conference entity.
     *
     */
    public function newAction()
    {
        $entity = new Conference();
        $form   = $this->createForm(new ConferenceType(), $entity);

        return $this->render('CfpConferenceBundle:Conference:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Conference entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CfpConferenceBundle:Conference')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conference entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CfpConferenceBundle:Conference:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Conference entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CfpConferenceBundle:Conference')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conference entity.');
        }

        $editForm = $this->createForm(new ConferenceType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CfpConferenceBundle:Conference:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Conference entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CfpConferenceBundle:Conference')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Conference entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ConferenceType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('conference_edit', array('id' => $id)));
        }

        return $this->render('CfpConferenceBundle:Conference:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Conference entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CfpConferenceBundle:Conference')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Conference entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('conference'));
    }

    /**
     * Creates a form to delete a Conference entity by id.
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
