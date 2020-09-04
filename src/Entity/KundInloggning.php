<?php

namespace App\Entity;

use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Kundinloggning
 *
 * @ORM\Table(name="KundInloggning", uniqueConstraints={@ORM\UniqueConstraint(name="ID_UNIQUE", columns={"ID"})})
 * @ORM\Entity
 */
class KundInloggning
{
    /**
     * @var int
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private int $id;
    
    public function getId() {
        return $this->id;
    }
    
    public function setId($value) {
        $this->id = $value;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="EmailAdress", type="string", length=128, nullable=false)
     */
    private string $emailAdress;

    public function getEmailAdress() {
        return $this->emailAdress;
    }
    
    public function setEmailAdress($value) {
        $this->emailAdress = $value;
    }

    /**
     * @var binary|null
     *
     * @ORM\Column(name="EmailAdressBekräftad", type="binary", nullable=true)
     */
    private bool $emailAdressBekräftad;

    public function getEmailAdressBekräftad() {
        return $this->emailAdressBekräftad;
    }
    
    public function setEmailAdressBekräftad($value) {
        $this->emailAdressBekräftad = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="Lösenord", type="string", length=130, nullable=true, options={"comment"="SHA-512 hash av lösenord."})
     */
    private string $lösenord;

    public function getLösenord() {
        return $this->lösenord;
    }
    
    public function setLösenord($value) {
        $this->lösenord = $value;
    }

    /**
     * @var string|null
     *
     * @ORM\Column(name="LösenordSalt", type="string", length=130, nullable=true, options={"comment"="SHA-512 hash av lösenordssalt."})
     */
    private string $lösenordSalt;
    
    public function getLösenordSalt() {
        return $this->lösenordSalt;
    }
    
    public function setLösenordSalt($value) {
        $this->lösenordSalt = $value;
    }

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="SenasteInloggning", type="datetime", nullable=true)
     */
    private DateTimeType $senasteInloggning;

    public function getSenasteInloggning() {
        return $this->senasteInloggning;
    }
    
    public function setSenasteInloggning($value) {
        $this->senasteInloggning = $value;
    }

    /**
     * @var string|null
     * 
     * @ORM\Column(name="Förnamn", type="string", length=64, nullable=true)
     */
    private string $förnamn;

    public function getFörnamn() {
        return $this->förnamn;
    }
    
    public function setFörnamn($value) {
        $this->förnamn = $value;
    }

    /**
     * @var string|null
     * 
     * @ORM\Column(name="Efternamn", type="string", length=64, nullable=true)
     */
    private string $efternamn;

    public function getEfternamn() {
        return $this->efternamn;
    }
    
    public function setEfternamn($value) {
        $this->efternamn = $value;
    }
}
