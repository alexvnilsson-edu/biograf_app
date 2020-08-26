<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kundinloggning
 *
 * @ORM\Table(name="KundInloggning", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class Kundinloggning
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
     * @var string
     *
     * @ORM\Column(name="EmailAdress", type="string", length=128, nullable=false)
     */
    private $emailadress;

    /**
     * @var binary|null
     *
     * @ORM\Column(name="EmailAdressBekräftad", type="binary", nullable=true)
     */
    private $emailadressbekräftad;

    /**
     * @var string|null
     *
     * @ORM\Column(name="Lösenord", type="string", length=64, nullable=true, options={"comment"="SHA-512 hash av lösenord."})
     */
    private $lösenord;

    /**
     * @var string|null
     *
     * @ORM\Column(name="LösenordSalt", type="string", length=64, nullable=true, options={"comment"="SHA-512 hash av lösenordssalt."})
     */
    private $lösenordsalt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="SenasteInloggning", type="datetime", nullable=true)
     */
    private $senasteinloggning;


}
