<?php

namespace AppBundle\Repository;

/**
 * VideojuegoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VideojuegoRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAll()
    {
        return $this->findBy(array(), array("nombre" => 'ASC'));
    }
}
