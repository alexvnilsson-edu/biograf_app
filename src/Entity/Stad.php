<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stad
 *
 * @ORM\Table(name="Stad")
 * @ORM\Entity
 */
class Stad
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
     * @ORM\Column(name="Namn", type="string", length=64, nullable=true)
     */
    public $namn;


}
