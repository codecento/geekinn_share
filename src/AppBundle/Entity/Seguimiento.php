<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Seguimiento
 *
 * @ORM\Table(name="seguimiento")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SeguimientoRepository")
 */
class Seguimiento
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

     /**
     * @var Videojuego
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Videojuego")
     */
    private $videojuego;

    /**
     * @var Usuario
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Usuario")
     */
    private $usuario;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set videojuego
     *
     * @param integer $videojuego
     *
     * @return Seguimiento
     */
    public function setvideojuego(\AppBundle\Entity\Videojuego $videojuego)
    {
        $this->videojuego = $videojuego;

        return $this;
    }

    /**
     * Get videojuego
     *
     * @return int
     */
    public function getvideojuego()
    {
        return $this->videojuego;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     *
     * @return Seguimiento
     */
    public function setusuario(\AppBundle\Entity\Usuario $usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return int
     */
    public function getusuario()
    {
        return $this->usuario;
    }
}

