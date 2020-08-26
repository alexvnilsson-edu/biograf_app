<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Biograf
 *
 * @ORM\Table(name="Biograf", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="FK_Stad_idx", columns={"StadID"})})
 * @ORM\Entity
 */
class Biograf
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
     * @ORM\Column(name="Namn", type="string", length=64, nullable=true)
     */
    private $namn;

    /**
     * @var \Stad
     *
     * @ORM\ManyToOne(targetEntity="Stad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="StadID", referencedColumnName="ID")
     * })
     */
    private $stadid;


}
