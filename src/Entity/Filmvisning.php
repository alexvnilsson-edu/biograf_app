<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmvisning
 *
 * @ORM\Table(name="FilmVisning", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="FK_FilmTitel_idx", columns={"FilmTitelID"}), @ORM\Index(name="FK_Salong_idx", columns={"SalongID"})})
 * @ORM\Entity
 */
class Filmvisning
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="StartTid", type="datetime", nullable=true)
     */
    private $starttid;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="SlutTid", type="datetime", nullable=true)
     */
    private $sluttid;

    /**
     * @var \Filmtitel
     *
     * @ORM\ManyToOne(targetEntity="Filmtitel")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FilmTitelID", referencedColumnName="ID")
     * })
     */
    private $filmtitelid;

    /**
     * @var \Salong
     *
     * @ORM\ManyToOne(targetEntity="Salong")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="SalongID", referencedColumnName="ID")
     * })
     */
    private $salongid;


}
