<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmvisning
 *
 * @ORM\Table(name="FilmVisning", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="FK_FilmTitel_idx", columns={"FilmTitelID"}), @ORM\Index(name="FK_Salong_idx", columns={"SalongID"})})
 * @ORM\Entity
 */
class FilmVisning
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="StartTid", type="datetime", nullable=true)
     */
    private $startTid;

    public function getStartTid() {
        return $this->startTid;
    }
    
    public function setStartTid($value) {
        $this->startTid = $value;
    }

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="SlutTid", type="datetime", nullable=true)
     */
    private $slutTid;

    public function getSlutTid() {
        return $this->slutTid;
    }
    
    public function setSlutTid($value) {
        $this->slutTid = $value;
    }
}
