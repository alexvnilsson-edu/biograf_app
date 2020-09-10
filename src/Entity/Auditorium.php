<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Auditorium
 *
 * @ORM\Table(name="auditorium")
 * @ORM\Entity
 */
class Auditorium
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($value)
    {
        $this->id = $value;
    }

    /**
     * @var int|null
     *
     * @ORM\ManyToOne(targetEntity="Cinema")
     * @ORM\JoinColumn(name="cinema_id", referencedColumnName="id")
     */
    private $cinema;

    public function getCinema()
    {
        return $this->cinema;
    }
    
    public function setCinema($value)
    {
        $this->cinema = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=true)
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
     * @ORM\Column(name="status", type="integer", nullable=true, options={"comment"="0: Stängd, 1: öppen, 2: tillfälligt stängd"})
     */
    private $status;

    public function getStatus()
    {
        return $this->status;
    }
    
    public function setStatus($value)
    {
        $this->status = $value;
    }
}
