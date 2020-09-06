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
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getId() {
        return $this->id;
    }
    
    public function setId($value) {
        $this->id = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="image_filename", type="string", length=128, nullable=true)
     */
    private $imageFilename;

    public function getImageFilename() {
        return $this->imageFilename;
    }
    
    public function setImageFilename($value) {
        $this->imageFilename = $value;
    }
}
