<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MovieCover
 *
 * @ORM\Table(name="movie_cover")
 * @ORM\Entity
 */
class MovieCover
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $imageFilename;

    //
    // Getters and setters
    //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageFilename(): ?string
    {
        return $this->imageFilename;
    }
    
    public function setImageFilename($value): self
    {
        $this->imageFilename = $value;

        return $this;
    }
}
