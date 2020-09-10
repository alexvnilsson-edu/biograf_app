<?php

namespace App\Entity;

use App\Repository\MovieScreeningRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="movie_screening")
 * @ORM\Entity(repositoryClass=MovieScreeningRepository::class)
 */
class MovieScreening
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="time")
     */
    private $timeStart;

    /**
     * @ORM\Column(type="time")
     */
    private $timeEnd;

    /**
     * @ORM\ManyToOne(targetEntity="Movie", inversedBy="screenings")
     * @ORM\JoinColumn(name="movie_id", referencedColumnName="id")
     */
    private $movie;

    /**
     * @ORM\OneToOne(targetEntity="Auditorium")
     * @ORM\JoinColumn(name="auditorium_id", referencedColumnName="id")
     */
    private $auditorium;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTimeStart(): ?\DateTimeInterface
    {
        return $this->timeStart;
    }

    public function setTimeStart(\DateTimeInterface $timeStart): self
    {
        $this->timeStart = $timeStart;

        return $this;
    }

    public function getTimeEnd(): ?\DateTimeInterface
    {
        return $this->timeEnd;
    }

    public function setTimeEnd(\DateTimeInterface $timeEnd): self
    {
        $this->timeEnd = $timeEnd;

        return $this;
    }

    public function getMovie(): ?Movie
    {
        return $this->movie;
    }

    public function setMovie(?Movie $movie): self
    {
        $this->movie = $movie;

        return $this;
    }

    public function getAuditorium()
    {
        return $this->auditorium;
    }
    
    public function setAuditorium($value): self
    {
        $this->auditorium = $value;

        return $this;
    }
}
