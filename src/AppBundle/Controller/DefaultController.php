<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="inicio")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $usuario = $this->getUser();
        $posts = $em->getRepository('AppBundle:Post')->findUltimosPostsDiferentes([],$usuario);
        $videojuegos = $em->getRepository('AppBundle:Videojuego')->findAll();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'posts' => $posts,
            'videojuegos' => $videojuegos
        ));
    }


}
