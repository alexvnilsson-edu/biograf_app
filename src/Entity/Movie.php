<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 *
 * @ORM\Table(name="movie")
 * @ORM\Entity
 */
class Movie
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
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=128, nullable=true)
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
     * @var int|null
     *
     * @ORM\Column(name="year_of_production", type="integer", nullable=true)
     */
    private int $yearOfProduction;

    public function getYearOfProduction()
    {
        return $this->yearOfProduction;
    }
    
    public function setYearOfProduction($value)
    {
        $this->yearOfProduction = $value;
    }

    /**
     * @var int|null
     *
     * @ORM\Column(name="year_of_release", type="integer", nullable=true)
     */
    private int $yearOfRelease;

    public function getYearOfRelease()
    {
        return $this->yearOfRelease;
    }
    
    public function setYearOfRelease($value)
    {
        $this->yearOfRelease = $value;
    }

    /**
     * @ORM\OneToOne(targetEntity="MovieCover")
     * @ORM\JoinColumn(name="movie_cover_id", referencedColumnName="id")
     */
    private MovieCover $cover;

    public function getCover()
    {
        return $this->cover;
    }
    
    public function setCover($value)
    {
        $this->cover = $value;
    }

    /**
     * @ORM\ManyToMany(targetEntity="MovieGenre")
     * @ORM\JoinTable(name="movies_genres",
     *      joinColumns={@ORM\JoinColumn(name="movie_id", referencedColumnName="id")}
     * )
     */
    private $genrer;

    public function getGenrer(): Collection
    {
        return $this->genrer;
    }
    
    public function setGenrer($value)
    {
        $this->genrer = $value;
    }

    public function __construct()
    {
        $this->genrer = new ArrayCollection();
    }
}
