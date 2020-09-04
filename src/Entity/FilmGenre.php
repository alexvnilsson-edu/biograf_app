<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmgenre
 *
 * @ORM\Table(name="FilmGenre", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class FilmGenre
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
     * @var string
     *
     * @ORM\Column(name="Namn", type="string", length=64, nullable=false)
     */
    private $namn;
    
    public function getNamn() {
        return $this->namn;
    }
    
    public function setNamn($value) {
        $this->namn = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="Beskrivning", type="string", length=512, nullable=true)
     */
    private $beskrivning;

    public function getBeskrivning() {
        return $this->beskrivning;
    }
    
    public function setBeskrivning($value) {
        $this->beskrivning = $value;
    }
}
