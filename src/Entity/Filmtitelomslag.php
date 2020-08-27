<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmtitelomslag
 *
 * @ORM\Table(name="FilmTitelOmslag", uniqueConstraints={@ORM\UniqueConstraint(name="BildfilNamn_UNIQUE", columns={"BildfilNamn"}), @ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="FK_FilmTitelOmslag_FilmTitel_idx", columns={"FilmTitelID"})})
 * @ORM\Entity
 */
class Filmtitelomslag
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
     * @var string|null
     *
     * @ORM\Column(name="BildfilNamn", type="string", length=66, nullable=true)
     */
    private $bildfilnamn;

    /**
     * @var \Filmtitel
     *
     * @ORM\ManyToOne(targetEntity="Filmtitel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FilmTitelID", referencedColumnName="ID")
     * })
     */
    private $filmtitelid;


}
