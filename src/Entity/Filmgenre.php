<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmgenre
 *
 * @ORM\Table(name="FilmGenre", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class Filmgenre
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Namn", type="string", length=64, nullable=false)
     */
    private $namn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Beskrivning", type="string", length=512, nullable=true)
     */
    private $beskrivning;


}
