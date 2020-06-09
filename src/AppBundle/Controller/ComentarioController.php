<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comentario;
use \DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Comentario controller.
 *
 * @Route("comentarios")
 */
class ComentarioController extends Controller
{

    /**
     * @Route("/comentar", name="comentar")
     */
    public function comentarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comentario = new Comentario();

        $post = $em->getRepository("AppBundle:Post")->findOneBy(array("id" => $request->request->get('post')));
        $comentario->setPost($post);
        $comentario->setTexto($request->request->get("texto"));
        $comentario->setusuario($this->getUser());
        $comentario->setFechaPublicacion(new DateTime());
        $em->persist($comentario);
        $em->flush();
        
        $this->addFlash(
            'notice',
            'Se ha subido el comentario correctamente.'
        );
        
        return $this->redirectToRoute('post', array("post" => $request->request->get('post')));
    }

    /**
     * @Route("/borrar_comentario", name="borrar_comentario")
     */
    public function borrarComentarioAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $comentario = $em->getRepository("AppBundle:Comentario")->find($request->get("comentario_id"));

        //Comprobar si el comentario está escrito por el usuario para poder borrar de forma segura
        if($this->getUser() == $comentario->getUsuario())
        {
            $em->remove($comentario);
            $em->flush();
            $this->addFlash(
                'notice',
                'Se ha borrado correctamente el comentario.'
            );
        }
        else
        {
            $this->addFlash(
                'notice',
                'No se ha podido borrar el comentario.'
            );
        }

        return $this->redirectToroute('post', array('post' => $request->get("post_id")));
    }

    /**
     * Lists all comentario entities.
     *
     * @Route("comentariocrud/", name="comentariocrud_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comentarios = $em->getRepository('AppBundle:Comentario')->findAll();

        return $this->render('comentario/index.html.twig', array(
            'comentarios' => $comentarios,
        ));
    }

    /**
     * Creates a new comentario entity.
     *
     * @Route("comentariocrud/new", name="comentariocrud_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comentario = new Comentario();
        $form = $this->createForm('AppBundle\Form\ComentarioType', $comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comentario);
            $em->flush();

            return $this->redirectToRoute('comentariocrud_show', array('id' => $comentario->getId()));
        }

        return $this->render('comentario/new.html.twig', array(
            'comentario' => $comentario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comentario entity.
     *
     * @Route("comentariocrud/{id}", name="comentariocrud_show")
     * @Method("GET")
     */
    public function showAction(Comentario $comentario)
    {
        $deleteForm = $this->createDeleteForm($comentario);

        return $this->render('comentario/show.html.twig', array(
            'comentario' => $comentario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comentario entity.
     *
     * @Route("comentariocrud/{id}/edit", name="comentariocrud_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comentario $comentario)
    {
        $deleteForm = $this->createDeleteForm($comentario);
        $editForm = $this->createForm('AppBundle\Form\ComentarioType', $comentario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comentariocrud_edit', array('id' => $comentario->getId()));
        }

        return $this->render('comentario/edit.html.twig', array(
            'comentario' => $comentario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comentario entity.
     *
     * @Route("comentariocrud/{id}", name="comentariocrud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comentario $comentario)
    {
        $form = $this->createDeleteForm($comentario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comentario);
            $em->flush();
        }

        return $this->redirectToRoute('comentariocrud_index');
    }

    /**
     * Creates a form to delete a comentario entity.
     *
     * @param Comentario $comentario The comentario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comentario $comentario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comentariocrud_delete', array('id' => $comentario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
