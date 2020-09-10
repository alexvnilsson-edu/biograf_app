<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Movie
 *
 * @ORM\Table(name="movie")
 * @ORM\Entity(repositoryClass=MovieRepository::class)
 */
class Movie
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=192, nullable=false)
     */
    private string $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $yearOfProduction;

    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    private $yearOfRelease;

    /**
     * @ORM\OneToOne(targetEntity="MovieCover")
     * @ORM\JoinColumn(name="movie_cover_id", referencedColumnName="id")
     */
    private $cover;

    /**
     * @ORM\ManyToMany(targetEntity="MovieGenre")
     * @ORM\JoinTable(name="movies_genres",
     *      joinColumns={@ORM\JoinColumn(name="movie_id", referencedColumnName="id")}
     * )
     */
    private $genres;

    /**
     * @ORM\OneToMany(targetEntity="MovieScreening", mappedBy="movie")
     */
    private $screenings;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
        $this->screenings = new ArrayCollection();
    }

    //
    // Getters and setters
    //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName($value): self
    {
        $this->name = $value;

        return $this;
    }

    public function getYearOfProduction(): ?int
    {
        return $this->yearOfProduction;
    }
    
    public function setYearOfProduction($value): self
    {
        $this->yearOfProduction = $value;

        return $this;
    }

    public function getYearOfRelease(): ?int
    {
        return $this->yearOfRelease;
    }
    
    public function setYearOfRelease($value): self
    {
        $this->yearOfRelease = $value;

        return $this;
    }

    public function getCover(): ?MovieCover
    {
        return $this->cover;
    }
    
    public function setCover($value): self
    {
        $this->cover = $value;

        return $this;
    }

    public function getGenres(): Collection
    {
        return $this->genres;
    }
    
    public function setGenres($value): self
    {
        $this->genres = $value;

        return $this;
    }

    public function getScreenings(): ?ArrayCollection
    {
        return $this->screenings;
    }
    
    public function setScreenings($value)
    {
        $this->screenings = $value;
    }
}
