<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Videojuego;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Videojuego controller.
 *
 * @Route("videojuegos")
 */
class VideojuegoController extends Controller
{
    /**
     * @Route("/portada", name="videojuegos")
     */
    //método para renderizar la portada de la página Videojuegos con todos los videojuegos de la BBDD
    public function videojuegosAction() 
    {
        $em = $this->getDoctrine()->getManager();
        $videojuegos = $em->getRepository("AppBundle:Videojuego")->findAll();
        return $this->render('videojuegos/videojuegos.html.twig', array(
            'videojuegos' => $videojuegos
        ));
    }
    

    /**
     * @Route("/{videojuego}", name="videojuego")
     * 
     */
    public function videojuegoAction($videojuego)
    {
        $em = $this->getDoctrine()->getManager();
        $videojuego = $em->getRepository("AppBundle:Videojuego")->findOneBy(array(
            "id" => $videojuego
        ));
        $posts = $em->getRepository("AppBundle:Post")->findBy(array(
            'videojuego' => $videojuego
        ));
        if(!empty($em->getRepository("AppBundle:Seguimiento")->findBy(array("usuario" => $this->getUser()->getId(), "videojuego" => $videojuego))))
        {
            $siguiendo = true;
        }else
        {
            $siguiendo = false;
        }

        return $this->render('videojuegos/videojuego.html.twig', array(
            'videojuego' => $videojuego,
            'posts' => $posts,
            'siguiendo' => $siguiendo
        ));
    }

    /**
     * Lists all videojuego entities.
     *
     * @Route("/videojuegocrud/", name="videojuegocrud_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $videojuegos = $em->getRepository('AppBundle:Videojuego')->findAll();

        return $this->render('videojuego/index.html.twig', array(
            'videojuegos' => $videojuegos,
        ));
    }

    /**
     * Creates a new videojuego entity.
     *
     * @Route("/videojuegocrud/new", name="videojuegocrud_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $videojuego = new Videojuego();
        $form = $this->createForm('AppBundle\Form\VideojuegoType', $videojuego);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($videojuego);
            $em->flush();

            return $this->redirectToRoute('videojuegocrud_show', array('id' => $videojuego->getId()));
        }

        return $this->render('videojuego/new.html.twig', array(
            'videojuego' => $videojuego,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a videojuego entity.
     *
     * @Route("/videojuegocrud/{id}", name="videojuegocrud_show")
     * @Method("GET")
     */
    public function showAction(Videojuego $videojuego)
    {
        $deleteForm = $this->createDeleteForm($videojuego);

        return $this->render('videojuego/show.html.twig', array(
            'videojuego' => $videojuego,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing videojuego entity.
     *
     * @Route("/videojuegocrud/{id}/edit", name="videojuegocrud_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Videojuego $videojuego)
    {
        $deleteForm = $this->createDeleteForm($videojuego);
        $editForm = $this->createForm('AppBundle\Form\VideojuegoType', $videojuego);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('videojuegocrud_edit', array('id' => $videojuego->getId()));
        }

        return $this->render('videojuego/edit.html.twig', array(
            'videojuego' => $videojuego,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a videojuego entity.
     *
     * @Route("/{id}", name="videojuegocrud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Videojuego $videojuego)
    {
        $form = $this->createDeleteForm($videojuego);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($videojuego);
            $em->flush();
        }

        return $this->redirectToRoute('videojuegocrud_index');
    }

    /**
     * Creates a form to delete a videojuego entity.
     *
     * @param Videojuego $videojuego The videojuego entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Videojuego $videojuego)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('videojuegocrud_delete', array('id' => $videojuego->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
