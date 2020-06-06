<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Seguimiento;
use AppBundle\Entity\Videojuego;
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
        //$videojuegoObjeto = new Videojuego();

        $videojuegoObjeto = $em->getRepository("AppBundle:Videojuego")->findOneBy(array("id" => $videojuego));

        $seguimiento->setvideojuego($videojuegoObjeto);
        $seguimiento->setusuario($this->getUser());
        $em->persist($seguimiento);
        $em->flush();

        $this->addFlash(
            'notice',
            'Ahora sigues a este juego.'
        );
        
        return $this->redirectToRoute('videojuego', array('videojuego' => $videojuego));
    }

    /**
     * @Route("/olvidar/{videojuego}", name="olvidar")
     */
    public function olvidarAction($videojuego)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioId = $this->getUser()->getId();
        
        $seguimiento = $em->getRepository("AppBundle:Seguimiento")->findOneBy(array("videojuego" => $videojuego, "usuario" => $usuarioId));

        //Comprobar si el comentario está escrito por el usuario para poder borrar de forma segura
        if($this->getUser() == $seguimiento->getUsuario())
        {
            $em->remove($seguimiento);
            $em->flush();
            $this->addFlash(
                'notice',
                'Has dejado de seguir este juego.'
            );
        }
        else
        {
            $this->addFlash(
                'notice',
                'No se ha podido dejar de seguir.'
            );
        }

        return $this->redirectToRoute('videojuego', array("videojuego" => $videojuego));
    }
}
