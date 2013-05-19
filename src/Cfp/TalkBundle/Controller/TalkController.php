<?php

namespace Cfp\TalkBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Cfp\TalkBundle\Entity\Talk;
use Cfp\TalkBundle\Entity\Speaker;
use Cfp\TalkBundle\Form\TalkType;

/**
 * Talk controller.
 *
 */
class TalkController extends Controller
{
    /**
     * Lists all Talk entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $user = $this->get('security.context')->getToken()->getUser();
        $entities = $em->getRepository('CfpTalkBundle:Talk')->findTalksForSpeaker($user);

        return $this->render('CfpTalkBundle:Talk:index.html.twig', array(
            'entities' => $entities,
        ));
    }

    /**
     * Creates a new Talk entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity  = new Talk();
        $form = $this->createForm(new TalkType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);

            $tmp = $request->request->get('cfp_talkbundle_talktype');
            foreach ($tmp['speakers'] as $speaker) {
                print($speaker);

                $u = $this->getDoctrine()->getManager()->getRepository('CfpUserBundle:User')->findOneById($speaker);
                if ($u) {
                    $s = new Speaker();
                    $s->setTalk($entity);
                    $s->setUser($u);
                    $s->setConfirmed(true);
                    $em->persist($s);
                }
            }

            $em->flush();

            return $this->redirect($this->generateUrl('talk_show', array('id' => $entity->getId())));
        }

        return $this->render('CfpTalkBundle:Talk:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Displays a form to create a new Talk entity.
     *
     */
    public function newAction()
    {
        $entity = new Talk();
        $form   = $this->createForm(new TalkType(), $entity);

        return $this->render('CfpTalkBundle:Talk:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Talk entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CfpTalkBundle:Talk')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Talk entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CfpTalkBundle:Talk:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Talk entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CfpTalkBundle:Talk')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Talk entity.');
        }

        $editForm = $this->createForm(new TalkType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('CfpTalkBundle:Talk:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Talk entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CfpTalkBundle:Talk')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Talk entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TalkType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('talk_edit', array('id' => $id)));
        }

        return $this->render('CfpTalkBundle:Talk:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Talk entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CfpTalkBundle:Talk')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Talk entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('talk'));
    }

    /**
     * Creates a form to delete a Talk entity by id.
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
