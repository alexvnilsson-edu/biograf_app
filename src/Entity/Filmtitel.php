<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filmtitel
 *
 * @ORM\Table(name="FilmTitel", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class Filmtitel
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
     * @ORM\Column(name="Titel", type="string", length=128, nullable=true)
     */
    private $titel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="OrginalTitel", type="string", length=128, nullable=true)
     */
    private $orginaltitel;

    /**
     * @var int|null
     *
     * @ORM\Column(name="ProduktionÅr", type="integer", nullable=true)
     */
    private $produktionÅr;

    /**
     * @var int|null
     *
     * @ORM\Column(name="UtgivningÅr", type="integer", nullable=true)
     */
    private $utgivningÅr;


}
