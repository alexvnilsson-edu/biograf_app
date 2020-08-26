<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmtitelgenre
 *
 * @ORM\Table(name="FilmTitelGenre", indexes={@ORM\Index(name="FK_FilmGenre_idx", columns={"FilmGenreID"}), @ORM\Index(name="FK_FilmTitel_idx", columns={"FilmTitelID"})})
 * @ORM\Entity
 */
class Filmtitelgenre
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
     * @var \Filmgenre
     *
     * @ORM\ManyToOne(targetEntity="Filmgenre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FilmGenreID", referencedColumnName="ID")
     * })
     */
    private $filmgenreid;

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
