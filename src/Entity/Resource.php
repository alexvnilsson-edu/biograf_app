<?php

namespace App\Entity;

use App\Repository\ResourceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Resource
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ResourceContainer")
     * @ORM\JoinColumn(name="resource_container_id", referencedColumnName="id")
     */
    private $container;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $filename;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created;

    //
    // Getters and setters
    //

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContainer(): ResourceContainer
    {
        return $this->container;
    }
    
    public function setContainer($value): self
    {
        $this->container = $value;
    
        return $this;
    }

    public function getFilename()
    {
        return $this->filename;
    }
    
    public function setFilename($value): self
    {
        $this->filename = $value;
    
        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
}
