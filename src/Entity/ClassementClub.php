<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClassementClubRepository")
 */
class ClassementClub
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $club;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\Column(type="integer")
     */
    private $joue;

    /**
     * @ORM\Column(type="integer")
     */
    private $gagne;

    /**
     * @ORM\Column(type="integer")
     */
    private $nul;

    /**
     * @ORM\Column(type="integer")
     */
    private $perdu;

    public function __Construct(){
        $this->numero = 0;
        $this->points = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getClub(): ?string
    {
        return $this->club;
    }

    public function setClub(string $club): self
    {
        $this->club = $club;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(): self
    {
        $this->points += ($this->gagne * 3) + ($this->nul);

        return $this;
    }

    public function getJoue(): ?int
    {
        return $this->joue;
    }

    public function setJoue(int $joue): self
    {
        $this->joue = $joue;

        return $this;
    }

    public function getGagne(): ?int
    {
        return $this->gagne;
    }

    public function setGagne(int $gagne): self
    {
        $this->gagne = $gagne;

        return $this;
    }

    public function getNul(): ?int
    {
        return $this->nul;
    }

    public function setNul(int $nul): self
    {
        $this->nul = $nul;

        return $this;
    }

    public function getPerdu(): ?int
    {
        return $this->perdu;
    }

    public function setPerdu(int $perdu): self
    {
        $this->perdu = $perdu;

        return $this;
    }
}
