<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Videojuego
 *
 * @ORM\Table(name="videojuego")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VideojuegoRepository")
 */
class Videojuego
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=50, unique=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="ruta_imagen", type="string", length=255)
     */
    private $rutaImagen;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_lanzamiento", type="datetime")
     */
    private $fechaLanzamiento;

    /**
     * @var string
     *
     * @ORM\Column(name="plataformas", type="string", length=50)
     */
    private $plataformas;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Videojuego
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Videojuego
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set rutaImagen
     *
     * @param string $rutaImagen
     *
     * @return Videojuego
     */
    public function setRutaImagen($rutaImagen)
    {
        $this->rutaImagen = $rutaImagen;

        return $this;
    }

    /**
     * Get rutaImagen
     *
     * @return string
     */
    public function getRutaImagen()
    {
        return $this->rutaImagen;
    }

    /**
     * Set fechaLanzamiento
     *
     * @param \DateTime $fechaLanzamiento
     *
     * @return Videojuego
     */
    public function setFechaLanzamiento($fechaLanzamiento)
    {
        $this->fechaLanzamiento = $fechaLanzamiento;

        return $this;
    }

    /**
     * Get fechaLanzamiento
     *
     * @return \DateTime
     */
    public function getFechaLanzamiento()
    {
        return $this->fechaLanzamiento;
    }

    /**
     * Set plataformas
     *
     * @param string $plataformas
     *
     * @return Videojuego
     */
    public function setPlataformas($plataformas)
    {
        $this->plataformas = $plataformas;

        return $this;
    }

    /**
     * Get plataformas
     *
     * @return string
     */
    public function getPlataformas()
    {
        return $this->plataformas;
    }
}

