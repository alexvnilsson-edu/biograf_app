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
    private $id;

    public function getId() {
        return $this->id;
    }

    public function setId($value) {
        $this->id = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="FullständigtNamn", type="string", length=128, nullable=true)
     */
    private $fullständigtNamn;

    public function getFullständigtNamn() {
        return $this->fullständigtNamn;
    }

    public function setFullständigtNamn($value) {
        $this->fullständigtNamn = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="EmailAddress", type="string", length=128, nullable=true, options={"comment"="E-postadress för personen om personen inte är kontoansvarig (d.v.s. anhörig)."})
     */
    private $emailAdress;

    public function getEmailAdress() {
        return $this->emailAdress;
    }

    public function setEmailAdress($value) {
        $this->emailAdress = $value;
    }

    /**
     * @var \KundInloggning
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\KundInloggning")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="KundInloggningID", referencedColumnName="ID")
     * })
     */
    private $kundInloggning;    

    public function getKundInloggning() {
        return $this->kundInloggning;
    }

    public function setKundInloggning($value) {
        $this->kundInloggning = $value;
    }
}
