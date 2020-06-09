<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

/**
 * Usuario controller.
 *
 * @Route("/usuarios")
 */
class UsuarioController extends Controller
{
    /**
     *  @Route("/perfil/{usuario}", name="perfil")
     */
    public function perfilAction(Request $request, $usuario)
    {
        $em = $this->getDoctrine()->getManager();
        $usuarioBBDD = $em->getRepository("AppBundle:Usuario")->findOneBy(array(
            'id' => $usuario
        ));
        $posts = $em->getRepository("AppBundle:Post")->findBy(array("usuario" => $usuario));

        $formulario = $this->createFormBuilder($usuarioBBDD)
            ->add('password', PasswordType::class)
            ->add('cambiar', SubmitType::class)
            ->getForm();

        $formulario->handleRequest($request);

        if($formulario->isValid())
        {
            $encoder = $this->get('security.encoder_factory')->getEncoder($usuarioBBDD);
            $passwordCodificado = $encoder->encodePassword($usuarioBBDD->getPassword(), null);
            $usuarioBBDD->setPassword($passwordCodificado);
            $em->persist($usuarioBBDD);
            $em->flush();
            $this->addFlash(
                'notice',
                'Se ha cambiado la contraseña.'
            );
        }
        

        return $this->render('usuarios/perfil.html.twig', array(
            'usuario' => $usuarioBBDD,
            'posts' => $posts,
            'formulario_contraseña' => $formulario->createView()
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
            $this->addFlash(
                'notice',
                'Te has registrado correctamente. ¡Inicia sesión!'
            );
            return $this->redirectToRoute('usuario_login');
        }   

        return $this->render('usuarios/registro.html.twig', array('formulario' => $formulario->createView(),));
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

    /**
     * Lists all usuario entities.
     *
     * @Route("/usuariocrud/", name="usuariocrud_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $usuarios = $em->getRepository('AppBundle:Usuario')->findAll();

        return $this->render('usuario/index.html.twig', array(
            'usuarios' => $usuarios,
        ));
    }

    /**
     * Creates a new usuario entity.
     *
     * @Route("/usuariocrud/new", name="usuariocrud_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $usuario = new Usuario();
        $form = $this->createForm('AppBundle\Form\UsuarioType', $usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($usuario);
            $em->flush();

            return $this->redirectToRoute('usuariocrud_show', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/new.html.twig', array(
            'usuario' => $usuario,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a usuario entity.
     *
     * @Route("/usuariocrud/{id}", name="usuariocrud_show")
     * @Method("GET")
     */
    public function showAction(Usuario $usuario)
    {
        $deleteForm = $this->createDeleteForm($usuario);

        return $this->render('usuario/show.html.twig', array(
            'usuario' => $usuario,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing usuario entity.
     *
     * @Route("/usuariocrud/{id}/edit", name="usuariocrud_edit")
     * @Method({"GET", "POST", "DELETE"})
     */
    public function editAction(Request $request, Usuario $usuario)
    {
        $deleteForm = $this->createDeleteForm($usuario);
        $editForm = $this->createForm('AppBundle\Form\UsuarioType', $usuario);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('usuariocrud_edit', array('id' => $usuario->getId()));
        }

        return $this->render('usuario/edit.html.twig', array(
            'usuario' => $usuario,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a usuario entity.
     *
     * @Route("/usuariocrud/delete/{id}", name="usuariocrud_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Usuario $usuario)
    {
        $form = $this->createDeleteForm($usuario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($usuario);
            
            $em->flush();
        }

        return $this->redirectToRoute('usuariocrud_index');
    }

    /**
     * Creates a form to delete a usuario entity.
     *
     * @param Usuario $usuario The usuario entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Usuario $usuario)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('usuariocrud_delete', array('id' => $usuario->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
