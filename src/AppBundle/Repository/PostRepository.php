<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PostRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PostRepository extends \Doctrine\ORM\EntityRepository
{
    //Consulta que recoge los ultimos posts para el inicio y que no están cargados aún
    public function findUltimosPostsDiferentes($postsCargados)
    {
        $postsCargados = "('". implode( "', '" , $postsCargados ) . "' )";

        $em = $this->getEntityManager();
        $dql = "SELECT p,u,v FROM AppBundle:Post p JOIN p.usuario u JOIN p.videojuego v WHERE p NOT IN ".$postsCargados."ORDER BY p.fechaCreacion DESC";
        $consulta = $em->createQuery($dql);
        //$consulta->setParameter('postsCargados', $postsCargados);
        $consulta->getMaxResults(5);

        return $consulta->getResult();
    }

    //Sobreescritura del método findOneBy de Symfony para evitar el lazy loading, cargando tambien los usuarios y los videojuegos además del post
    public function findPostSeleccionado(array $criteria)
    {
        $id = $criteria["id"];
        $em = $this->getEntityManager();
        $dql = "SELECT p,u,v FROM AppBundle:Post p JOIN p.usuario u JOIN p.videojuego v WHERE p.id LIKE :id";
        $consulta = $em->createQuery($dql);
        $consulta->setParameter('id', $id);
        
        return $consulta->getSingleResult(); //Esta vez se obtiene un solo resultado para que no devuelva array de un solo resultado y no se tenga que recorrer en la plantilla
    }
}
