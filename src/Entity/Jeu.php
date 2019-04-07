<?php

namespace App\Entity;



use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JeuRepository")
 */
class Jeu
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
    private $Lieu;

    /**
     * @ORM\Column(type="time")
     */
    private $heure;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $score;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Equipe" ,mappedBy="jeux")
     */
    private $equipes;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", mappedBy="jeux")
     */
    private $Utilisateurs;
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stats",mappedBy="jeu")
     */
    private $stats;
    public function __construct()
    {
        $this-> Utilisateurs = new ArrayCollection();
        $this-> equipes = new ArrayCollection();
        $this-> stats = new ArrayCollection();

    }


    public function getId(): ?int
    {
        return $this->id;
    }



    public function getLieu(): ?string
    {
        return $this->Lieu;
    }

    public function setLieu(string $Lieu): self
    {
        $this->Lieu = $Lieu;

        return $this;
    }

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getScore(): ?int
    {
        return $this->score;
    }

    public function setScore(?int $score): self
    {
        $this->score = $score;

        return $this;
    }


    public function __toString()
    {
        return $this->Lieu;
    }
    public function getEquipes(): Collection
    {
        return $this->equipes;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->Utilisateurs;
    }

    public function addJeux(Utilisateur $Utilisateurs): self
    {
        if (!$this->Jeux->contains($Utilisateurs)) {
            $this->Jeux[] = $Utilisateurs;
            $Utilisateurs->addJeux($this);
        }

        return $this;
    }

    public function removeJeux(Utilisateur $Utilisateurs): self
    {
        if ($this->Jeux->contains($Utilisateurs)) {
            $this->Jeux->removeElement($Utilisateurs);
            $Utilisateurs->removeJeux($this);
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getStats()
    {
        return $this->stats;
    }

}
