<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmvisning
 *
 * @ORM\Table(name="FilmVisning", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="FK_FilmTitel_idx", columns={"FilmTitelID"}), @ORM\Index(name="FK_Salong_idx", columns={"SalongID"})})
 * @ORM\Entity
 */
class FilmVisning
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="StartTid", type="datetime", nullable=true)
     */
    public $starttid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="SlutTid", type="datetime", nullable=true)
     */
    public $sluttid;

    /**
     * @var \Filmtitel
     *
     * @ORM\ManyToOne(targetEntity="Filmtitel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FilmTitelID", referencedColumnName="ID")
     * })
     */
    public $filmtitelid;

    /**
     * @var \Salong
     *
     * @ORM\ManyToOne(targetEntity="Salong")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="SalongID", referencedColumnName="ID")
     * })
     */
    public $salongid;


}
