<?php

namespace App\Entity;

use App\Repository\ResourceContainerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class ResourceContainer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=256)
     */
    private $pathPrefix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPathPrefix(): ?string
    {
        return $this->pathPrefix;
    }

    public function setPathPrefix(string $pathPrefix): self
    {
        $this->pathPrefix = $pathPrefix;

        return $this;
    }
}
