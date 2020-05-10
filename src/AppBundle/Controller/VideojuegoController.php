<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class VideojuegoController extends Controller
{
    /**
     * @Route("/videojuegos", name="")
     */
    //método para renderizar la portada de la página Videojuegos con todos los videojuegos de la BBDD
    public function portadaAction() 
    {
        $em = $this->getRepository()->getManager();
        $videojuegos = $em->getRepository("AppBundle:Videojuego")->findAll();
        return $this->render('videojuegos/videojuegos.html.twig', array(
            'videojuegos' => $videojuegos
        ));
    }
}