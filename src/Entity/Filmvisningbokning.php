<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmvisningbokning
 *
 * @ORM\Table(name="FilmVisningBokning", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="FK_FilmVisning_idx", columns={"FilmVisningID"}), @ORM\Index(name="FK_KundPerson_idx", columns={"KundPersonID"})})
 * @ORM\Entity
 */
class Filmvisningbokning
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var \Filmvisning
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Filmvisning")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="FilmVisningID", referencedColumnName="ID")
     * })
     */
    private $filmvisningid;

    /**
     * @var \Kundperson
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Kundperson")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="KundPersonID", referencedColumnName="ID")
     * })
     */
    private $kundpersonid;


}
