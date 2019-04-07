<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Time;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateurJeuxRepository")
 */
class UtilisateurJeux
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Jeu", cascade={"persist", "remove"})
     */
    private $jeu;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Utilisateur", cascade={"persist", "remove"})
     */
    private $utilisateur;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numPronostique;

    /**
     * @ORM\Column(type="time")
     */
    private $heure;
    public function __construct(){
        $this->heure(new \DateTime('now'));
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


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJeu(): ?Jeu
    {
        return $this->jeu;
    }

    public function setJeu(?Jeu $jeu): self
    {
        $this->jeu = $jeu;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getNumPronostique(): ?int
    {
        return $this->numPronostique;
    }

    public function setNumPronostique(?int $numPronostique): self
    {
        $this->numPronostique = $numPronostique;

        return $this;
    }
}
