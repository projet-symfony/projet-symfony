<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Cocur\Slugify\Slugify;


/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurRepository")
 */
class Utilisateur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Password;


    /**
     * @ORM\Column(type="integer", nullable=true)
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

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Jeu", inversedBy="Jeux")
     */
    private $jeux;



    public function __construct()
    {
        $this->tauxReussite = 0;
        $this->jeux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(?string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(?string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->Login;
    }

    public function setLogin(string $Login): self
    {
        $this->Login = $Login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getNbrePronostiques(): ?int
    {
        return $this->nbrePronostiques;
    }

    public function setNbrePronostiques(?int $nbrePronostiques): self
    {
        $this->nbrePronostiques = $nbrePronostiques;

        return $this;
    }

    public function getTauxReussite(): ?float
    {
        return $this->tauxReussite;
    }


    public function setTauxReussite(): self
    {
        $this->tauxReussite = ($this->nbreReussite * 100)/$this->nbrePronostiques;
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

    /**
     * @return Collection|Jeu[]
     */
    public function getJeux(): Collection
    {
        return $this->jeux;
    }

    public function addJeux(Jeu $jeux): self
    {
        if (!$this->jeux->contains($jeux)) {
            $this->jeux[] = $jeux;
        }

        return $this;
    }

    public function removeJeux(Jeu $jeux): self
    {
        if ($this->jeux->contains($jeux)) {
            $this->jeux->removeElement($jeux);
        }

        return $this;
    }


}
