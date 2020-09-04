<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kundperson
 *
 * @ORM\Table(name="KundPerson", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})}, indexes={@ORM\Index(name="FK_KundInloggning_idx", columns={"KundInloggningID"})})
 * @ORM\Entity
 */
class KundPerson
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
     * @ORM\Column(name="FullständigtNamn", type="string", length=128, nullable=true)
     */
    public $fullständigtnamn;

    /**
     * @var string|null
     *
     * @ORM\Column(name="EmailAddress", type="string", length=128, nullable=true, options={"comment"="E-postadress för personen om personen inte är kontoansvarig (d.v.s. anhörig)."})
     */
    public $emailaddress;

    /**
     * @var \Kundinloggning
     *
     * @ORM\ManyToOne(targetEntity="Kundinloggning")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="KundInloggningID", referencedColumnName="ID")
     * })
     */
    public $kundinloggningid;


}
