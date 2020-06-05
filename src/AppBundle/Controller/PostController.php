<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Post;
use AppBundle\Entity\Videojuego;
use DateTime;

/**
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
}