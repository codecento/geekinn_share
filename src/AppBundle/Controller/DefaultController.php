<?php

namespace AppBundle\Controller;

use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/crud", name="crud")
     */
    public function crudAction()
    {
        return $this->render('crud/crud.html.twig');
    }

    /**
     * @Route("/", name="inicio")
     * @Route("/inicio")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->getUser();
        $posts = $em->getRepository('AppBundle:Post')->findUltimosPosts([], $usuario);
        $videojuegos = $em->getRepository('AppBundle:Videojuego')->findAll();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'posts' => $posts,
            'videojuegos' => $videojuegos
        ));
    }

    /** 
     * @Route("/cargar_posts", name="cargar_posts")
     */
    public function cargarPostsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->getUser();
        $posts = $em->getRepository('AppBundle:Post')->findPostsExtra($request->request->get("postsCargados"), $usuario);

        $datosHtml = "";

        foreach ($posts as $post) {
            $fecha = $post->getFecha_Creacion();

            $datosHtml .= "<div class=\"card post text-light elemento mb-3\" id=\"" . $post->getId() . "\">
			<div class=\"card-body\">
				<a href=\"/geekinn_share/web/app_dev.php/usuarios/perfil/" . $post->getUsuario()->getId() . "\">
					<h6 class=\"card-title text-light\">" . $post->getUsuario()->getNombre() . "</h5>
				</a>
				<h6 class=\"card-subtitle mb-2 text-muted\">Hablando de:
					" . $post->getVideojuego()->getNombre() . "
					<span class=\"ml-auto\">|
						" . $fecha->format("d-m-Y H:i:s") . "</span>
				</h6>
                <p class=\"card-text mb-2\">" . $post->getTexto() . "</p>";

            if ($this->getUser() == $post->getUsuario()) {
                $datosHtml .= "<a href=\"/geekinn_share/web/app_dev.php/posts/borrar/" . $post->getId() . "\" class=\"boton-borrar-post card-link btn btn-light\">Borrar</a>";
            }

            $datosHtml .= "<a href=\"/geekinn_share/web/app_dev.php/posts/post/" . $post->getId() . "\" class=\"card-link btn btn-light\">Comentar</a></div></div>";
        }

        return new Response($datosHtml);
    }
}
