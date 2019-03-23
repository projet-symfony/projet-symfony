<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PronostiqueurRepository")
 */
class Pronostiqueur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrePronostiques;

    /**
     * @ORM\Column(type="float")
     */
    private $tauxReussite;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbreReussite;

    public function __Construct(){
        $this->tauxReussite = 0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getNbrePronostiques(): ?int
    {
        return $this->nbrePronostiques;
    }

    public function setNbrePronostiques(int $nbrePronostiques): self
    {
        $this->nbrePronostiques = $nbrePronostiques;

        return $this;
    }

    public function getTauxReussite(): ?float
    {
        return $this->tauxReussite;
    }

    public function setTauxReussite(float $tauxReussite): self
    {
        $this->tauxReussite = $tauxReussite;

        return $this;
    }

    public function getNbreReussite(): ?int
    {
        return $this->nbreReussite;
    }

    public function setNbreReussite(int $nbreReussite): self
    {
        $this->nbreReussite = $nbreReussite;

        return $this;
    }
}
