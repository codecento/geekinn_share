<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Post controller.
 *
 * @Route("/posts")
 */
class PostController extends Controller
{
    

    /**
     * @Route("/post/{post}", name="post")
     */
    //método para renderizar la página de un post
    public function postAction($post) 
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository("AppBundle:Post")->findPostSeleccionado(array("id" => $post)); //obtener un post de la bbdd mediante su id
        $comentarios = $em->getRepository("AppBundle:Comentario")->findBy(array("post" => $post));
        
        return $this->render('posts/post.html.twig', array(
            'post' => $post,
            'comentarios' => $comentarios
        ));
    }

    /**
     * @Route("/publicar", name="publicar")
     */
    public function publicarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $post = new Post();

        $videojuego = $em->getRepository("AppBundle:Videojuego")->findOneBy(array("nombre" => $request->request->get('videojuego')));
        $post->setvideojuego($videojuego);
        $post->setTexto($request->request->get("texto"));
        $post->setusuario($this->getUser());
        $post->setFechaCreacion(new DateTime());
        $em->persist($post);
        $em->flush();
        
        $this->addFlash(
            'notice',
            'Se ha subido el post correctamente.'
        );

        return $this->redirectToRoute('inicio');

    }

    /**
     * @Route("/borrar/{post_id}", name="borrar_post")
     */
    public function borrarPostAction($post_id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository("AppBundle:Post")->find($post_id);

        //Comprobar si el comentario está escrito por el usuario para poder borrar de forma segura
        if($this->getUser() == $post->getUsuario())
        {
            $em->remove($post);
            $em->flush();
            $this->addFlash(
                'notice',
                'Se ha borrado correctamente el post.'
            );
        }
        else
        {
            $this->addFlash(
                'notice',
                'No se ha podido borrar el post.'
            );
        }

        return $this->redirectToroute('inicio');
    }

    /**
     * Lists all post entities.
     *
     * @Route("/postcrud/", name="post_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $posts = $em->getRepository('AppBundle:Post')->findAll();

        return $this->render('post/index.html.twig', array(
            'posts' => $posts,
        ));
    }

    /**
     * Creates a new post entity.
     *
     * @Route("/postcrud/new", name="post_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $post = new Post();
        $form = $this->createForm('AppBundle\Form\PostType', $post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('post_show', array('id' => $post->getId()));
        }

        return $this->render('post/new.html.twig', array(
            'post' => $post,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a post entity.
     *
     * @Route("/postcrud/{id}", name="post_show")
     * @Method("GET")
     */
    public function showAction(Post $post)
    {
        $deleteForm = $this->createDeleteForm($post);

        return $this->render('post/show.html.twig', array(
            'post' => $post,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing post entity.
     *
     * @Route("/postcrud/{id}/edit", name="post_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Post $post)
    {
        $deleteForm = $this->createDeleteForm($post);
        $editForm = $this->createForm('AppBundle\Form\PostType', $post);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('post_edit', array('id' => $post->getId()));
        }

        return $this->render('post/edit.html.twig', array(
            'post' => $post,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a post entity.
     *
     * @Route("/postcrud/{id}", name="post_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Post $post)
    {
        $form = $this->createDeleteForm($post);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($post);
            $em->flush();
        }

        return $this->redirectToRoute('post_index');
    }

    /**
     * Creates a form to delete a post entity.
     *
     * @param Post $post The post entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Post $post)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('post_delete', array('id' => $post->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
