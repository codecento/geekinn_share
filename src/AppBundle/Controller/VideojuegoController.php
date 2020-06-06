<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 *  @Route("/videojuegos")
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
}