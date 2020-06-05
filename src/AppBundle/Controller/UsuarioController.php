<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Post;
use AppBundle\Entity\Usuario;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Security\Core\Encoder\EncoderFactory;

/**
 *  @Route("/usuarios")
 */
class UsuarioController extends Controller
{
    /**
     *  @Route("/perfil/{usuario}", name="perfil")
     */
    public function perfilAction($usuario)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioBBDD = $em->getRepository("AppBundle:Usuario")->findOneBy(array(
            'id' => $usuario
        ));
        $posts = $em->getRepository("AppBundle:Post")->findBy(array("usuario" => $usuario));

        return $this->render('usuarios/perfil.html.twig', array(
            'usuario' => $usuarioBBDD,
            'posts' => $posts
        ));
    }

    /** 
     * @Route("/registro", name="usuario_registro") 
     */
    public function registroAction(Request $request)
    {

        $usuario = new Usuario();

        $formulario = $this->createFormBuilder($usuario)
            ->add('email', TextType::class)
            ->add('nombre', TextType::class)
            ->add('password', PasswordType::class)
            ->add('rutaimagen', FileType::class)
            ->add('acceder', SubmitType::class)
            ->getForm();

        $formulario->handleRequest($request);

        if ($formulario->isValid()) {
            $encoder = $this->get('security.encoder_factory')->getEncoder($usuario);
            $passwordCodificado = $encoder->encodePassword($usuario->getPassword(), null);
            $usuario->setPassword($passwordCodificado);
            move_uploaded_file ($_FILES["form"]["tmp_name"]["rutaimagen"] , "img/usuarios/".$_FILES["form"]["name"]["rutaimagen"]);
            $usuario->setRutaImagen("img/usuarios/".$_FILES["form"]["name"]["rutaimagen"]);
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();
            return $this->redirectToRoute('inicio');
        }



        return $this->render('usuarios/registro.html.twig', array('formulario' => $formulario->createView()));
    }


    /** 
     * @Route("/login", name="usuario_login") 
     */
    public function loginAction()
    {
        $authUtils = $this->get('security.authentication_utils');
        return $this->render('usuarios/login.html.twig', array('last_username' => $authUtils->getLastUsername(), 'error' => $authUtils->getLastAuthenticationError(),));
    }

    /** 
     * @Route("/login_check", name="usuario_login_check") 
     */
    public function loginCheckAction()
    {
        // el "login check" lo hace Symfony automáticamente, por lo que 
        // no hay que añadir ningún código en este método
    }

    /** 
     * @Route("/logout", name="usuario_logout") 
     */
    public function logoutAction()
    {
        // el logout lo hace Symfony automáticamente, por lo que 
        // no hay que añadir ningún código en este método 
    }
}
