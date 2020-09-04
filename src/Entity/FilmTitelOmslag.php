<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmtitelomslag
 *
 * @ORM\Table(name="FilmTitelOmslag", uniqueConstraints={@ORM\UniqueConstraint(name="BildfilNamn_UNIQUE", columns={"BildfilNamn"}), @ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="FK_FilmTitelOmslag_FilmTitel_idx", columns={"FilmTitelID"})})
 * @ORM\Entity
 */
class FilmTitelOmslag
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
     * @var string|null
     *
     * @ORM\Column(name="BildfilNamn", type="string", length=66, nullable=true)
     */
    private $bildFilnamn;

    public function getBildFilnamn() {
        return $this->bildFilnamn;
    }
    
    public function setBildFilnamn($value) {
        $this->bildFilnamn = $value;
    }

    /**
     * @var \FilmTitel
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\FilmTitel")
     * @ORM\JoinTable(name={
     *   @ORM\JoinColumn(name="FilmTitelID", referencedColumnName="ID")
     * })
     */
    private $filmFitelId;


}
