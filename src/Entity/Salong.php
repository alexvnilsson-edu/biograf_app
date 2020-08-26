<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Salong
 *
 * @ORM\Table(name="Salong", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class Salong
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
     * @var int|null
     *
     * @ORM\Column(name="BiografID", type="integer", nullable=true)
     */
    private $biografid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Namn", type="string", length=64, nullable=true)
     */
    private $namn;

    /**
     * @var int|null
     *
     * @ORM\Column(name="Status", type="integer", nullable=true, options={"comment"="0: Stängd
1: Öppen
2: Tillfälligt stängd"})
     */
    private $status;


}
