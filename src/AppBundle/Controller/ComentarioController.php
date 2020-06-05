<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comentario;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comentarios")
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
        $comentario->setPostId($post);
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
}
