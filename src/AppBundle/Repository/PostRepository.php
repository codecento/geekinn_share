<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

 
class PostRepository extends \Doctrine\ORM\EntityRepository
{
    //Consulta que recoge los ultimos posts para el inicio y que no están cargados aún
    public function findUltimosPosts($postsCargados, $usuario)
    {
        $em = $this->getEntityManager();

        $postsCargados = "('" . implode("', '", $postsCargados) . "' )";

        if ($usuario !== null) {
            $seguimientos = $em->getRepository("AppBundle:Seguimiento")->findVideojuegosDeSeguimiento($usuario);
            $videojuegosArray = [];

            foreach ($seguimientos as $seguimiento) {
                $videojuegosArray[] = $seguimiento->getVideojuego()->getId();
            }

            $videojuegos = "('" . implode("', '", $videojuegosArray) . "' )";

            $dql = "SELECT p,u,v FROM AppBundle:Post p JOIN p.usuario u JOIN p.videojuego v WHERE p NOT IN " . $postsCargados . " AND p.videojuego IN $videojuegos ORDER BY p.fechaCreacion DESC";
        } else {
            $dql = "SELECT p,u,v FROM AppBundle:Post p JOIN p.usuario u JOIN p.videojuego v ORDER BY p.fechaCreacion DESC";
        }

        $consulta = $em->createQuery($dql);
        //$consulta->setParameter('postsCargados', $postsCargados);
        $consulta->setMaxResults(5);
        return $consulta->getResult();
    }

    //Consulta que recoge los ultimos posts para el inicio y que no están cargados aún
    public function findPostsExtra($postsCargados, $usuario)
    {
        $em = $this->getEntityManager();

        $postsCargados = "('" . implode("', '", $postsCargados) . "' )";

        $seguimientos = $em->getRepository("AppBundle:Seguimiento")->findVideojuegosDeSeguimiento($usuario);
        $videojuegosArray = [];

        foreach ($seguimientos as $seguimiento) {
            $videojuegosArray[] = $seguimiento->getVideojuego()->getId();
        }

        $videojuegos = "('" . implode("', '", $videojuegosArray) . "' )";

        $dql = "SELECT p,u,v FROM AppBundle:Post p JOIN p.usuario u JOIN p.videojuego v WHERE p NOT IN " . $postsCargados . " AND p.videojuego IN $videojuegos ORDER BY p.fechaCreacion DESC";

        $consulta = $em->createQuery($dql);
        //$consulta->setParameter('postsCargados', $postsCargados);
        $consulta->setMaxResults(5);
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
