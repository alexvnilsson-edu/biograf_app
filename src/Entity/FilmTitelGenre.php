<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmtitelgenre
 *
 * @ORM\Table(name="FilmTitelGenre", indexes={@ORM\Index(name="FK_FilmGenre_idx", columns={"FilmGenreID"}), @ORM\Index(name="FK_FilmTitel_idx", columns={"FilmTitelID"})})
 * @ORM\Entity
 */
class FilmTitelGenre
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
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
     * @var \FilmGenre
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\FilmGenre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FilmGenreID", referencedColumnName="ID")
     * })
     */
    private $filmGenre;

    public function getFilmGenre() {
        return $this->filmGenre;
    }
    
    public function setFilmGenre($value) {
        $this->filmGenre = $value;
    }

    /**
     * @var \FilmTitel
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\FilmTitel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FilmTitelID", referencedColumnName="ID")
     * })
     */
    private $filmTitel;

    public function getFilmTitel() {
        return $this->filmTitel;
    }
    
    public function setFilmTitel($value) {
        $this->filmTitel = $value;
    }
}
