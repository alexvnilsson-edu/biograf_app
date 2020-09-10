<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cinema
 *
 * @ORM\Table(name="cinema")
 * @ORM\Entity
 */
class Cinema
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=64, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    private City $city;

    public function getId()
    {
        return $this->id;
    }
    
    public function setId($value): self
    {
        $this->id = $value;

        return $this;
    }

    public function getName()
    {
        return $this->name;
    }
    
    public function setName($value): self
    {
        $this->name = $value;

        return $this;
    }

    public function getCity()
    {
        return $this->city;
    }
    
    public function setCity($value): self
    {
        $this->city = $value;

        return $this;
    }
}
