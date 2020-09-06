<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovieGenre
 *
 * @ORM\Table(name="movie_genre")
 * @ORM\Entity
 */
class MovieGenre
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private string $name;

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($value)
    {
        $this->name = $value;
    }

    /**
     * @ORM\Column(name="movie_id", type="integer", nullable=false)
     */
    private $movie;

    public function getMovie()
    {
        return $this->movie;
    }
    
    public function setMovie($value)
    {
        $this->movie = $value;
    }
}
