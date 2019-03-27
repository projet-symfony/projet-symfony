<?php

namespace App\Entity;

 HEAD

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
 master
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

HEAD

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
     * @ORM\OneToOne(targetEntity="App\Entity\Equipe", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEquipe1;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Equipe", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $idEquipe2;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Utilisateur", mappedBy="ListeMatch")
     */
    private $ListeUtilisateurs;

    public function __construct()
    {
        $this->ListeUtilisateurs = new ArrayCollection();
    }

 master
    public function getId(): ?int
    {
        return $this->id;
    }
 HEAD


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

    public function getIdEquipe1(): ?Equipe
    {
        return $this->idEquipe1;
    }

    public function setIdEquipe1(Equipe $idEquipe1): self
    {
        $this->idEquipe1 = $idEquipe1;

        return $this;
    }

    public function getIdEquipe2(): ?Equipe
    {
        return $this->idEquipe2;
    }

    public function setIdEquipe2(Equipe $idEquipe2): self
    {
        $this->idEquipe2 = $idEquipe2;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getListeUtilisateurs(): Collection
    {
        return $this->ListeUtilisateurs;
    }

    public function addListeUtilisateur(Utilisateur $listeUtilisateur): self
    {
        if (!$this->ListeUtilisateurs->contains($listeUtilisateur)) {
            $this->ListeUtilisateurs[] = $listeUtilisateur;
            $listeUtilisateur->addListeMatch($this);
        }

        return $this;
    }

    public function removeListeUtilisateur(Utilisateur $listeUtilisateur): self
    {
        if ($this->ListeUtilisateurs->contains($listeUtilisateur)) {
            $this->ListeUtilisateurs->removeElement($listeUtilisateur);
            $listeUtilisateur->removeListeMatch($this);
        }

        return $this;
    }




 master
}
