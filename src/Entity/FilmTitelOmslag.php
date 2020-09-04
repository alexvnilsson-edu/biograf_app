<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmtitelomslag
 *
 * @ORM\Table(name="FilmTitelOmslag", uniqueConstraints={@ORM\UniqueConstraint(name="BildfilNamn_UNIQUE", columns={"BildfilNamn"}), @ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="FK_FilmTitelOmslag_FilmTitel_idx", columns={"FilmTitelID"})})
 * @ORM\Entity
 */
class FilmTitelOmslag
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="BildfilNamn", type="string", length=66, nullable=true)
     */
    public $bildfilnamn;

    /**
     * @var \Filmtitel
     *
     * @ORM\ManyToOne(targetEntity="Filmtitel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FilmTitelID", referencedColumnName="ID")
     * })
     */
    public $filmtitelid;


}
