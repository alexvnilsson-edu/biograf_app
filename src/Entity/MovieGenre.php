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
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(name="name", type="string", length=64, nullable=false)
     */
    private string $name;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $movie;

    //
    // Getters and setters
    //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($value): self
    {
        $this->name = $value;

        return $this;
    }

    public function getMovie()
    {
        return $this->movie;
    }
    
    public function setMovie($value): self
    {
        $this->movie = $value;

        return $this;
    }
}
