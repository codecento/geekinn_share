<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Seguimiento;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SeguimientoController extends Controller
{
    /**
     * @Route("/seguir/{videojuego}", name="seguir")
     */
    public function seguirAction($videojuego)
    {
        $em = $this->getDoctrine()->getManager();
        $seguimiento = new Seguimiento();
        $posts = $em->getRepository('AppBundle:Post')->findUltimosPostsDiferentes([3]);
        $videojuegos = $em->getRepository('AppBundle:Videojuego')->findAll();
        
        return $this->redirectToroute('videojuego', array('videojuego' => $request->get("post_id")));
    }


}
