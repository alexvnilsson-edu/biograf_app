<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Filmtitel
 *
 * @ORM\Table(name="FilmTitel", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class FilmTitel
{
    public function __construct()
    {
        $this->genrer = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    public function getId() {
        return $this->id;
    }
    
    public function setId($value) {
        $this->id = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="Titel", type="string", length=128, nullable=true)
     */
    private string $titel;

    public function getTitel() {
        return $this->titel;
    }
    
    public function setTitel($value) {
        $this->titel = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="OrginalTitel", type="string", length=128, nullable=true)
     */
    private string $orginalTitel;

    public function getOrginalTitel() {
        return $this->orginalTitel;
    }
    
    public function setOrginalTitel($value) {
        $this->orginalTitel = $value;
    }

    /**
     * @var int|null
     *
     * @ORM\Column(name="ProduktionÅr", type="integer", nullable=true)
     */
    private int $produktionÅr;

    public function getProduktionÅr() {
        return $this->produktionÅr;
    }
    
    public function setProduktionÅr($value) {
        $this->produktionÅr = $value;
    }

    /**
     * @var int|null
     *
     * @ORM\Column(name="UtgivningÅr", type="integer", nullable=true)
     */
    private int $utgivningÅr;

    public function getUtgivningÅr() {
        return $this->utgivningÅr;
    }
    
    public function setUtgivningÅr($value) {
        $this->utgivningÅr = $value;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FilmGenre")
     * @ORM\JoinTable(name="FilmTitleGenre",
     *      joinColumns={@ORM\JoinColumn(name="KundInloggningID", referencedColumnName="ID")})
     */
    private Collection $genrer;

    public function getGenrer(): Collection {
        return $this->genrer;
    }
    
    public function setGenrer($value) {
        $this->genrer = $value;
    }

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\FilmVisning")
     * @ORM\JoinTable(name="FilmVisning", 
     *      joinColumns={@ORM\JoinColumns(name="FilmTitelID", referencedColumnName="ID")})
     */
    private Collection $visningar;

    public function getVisningar() {
        return $this->visningar;
    }
    
    public function setVisningar($value) {
        $this->visningar = $value;
    }
}
