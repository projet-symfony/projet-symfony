<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipeRepository")
 */
class Equipe
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pays;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbpronostique;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbMatchJoue;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbMatchPerdu;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbMatchNull;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(?string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getNbpronostique(): ?int
    {
        return $this->nbpronostique;
    }

    public function setNbpronostique(?int $nbpronostique): self
    {
        $this->nbpronostique = $nbpronostique;

        return $this;
    }

    public function getNbMatchJoue(): ?int
    {
        return $this->nbMatchJoue;
    }

    public function setNbMatchJoue(?int $nbMatchJoue): self
    {
        $this->nbMatchJoue = $nbMatchJoue;

        return $this;
    }

    public function getNbMatchPerdu(): ?int
    {
        return $this->nbMatchPerdu;
    }

    public function setNbMatchPerdu(?int $nbMatchPerdu): self
    {
        $this->nbMatchPerdu = $nbMatchPerdu;

        return $this;
    }

    public function getNbMatchNull(): ?int
    {
        return $this->nbMatchNull;
    }

    public function setNbMatchNull(?int $nbMatchNull): self
    {
        $this->nbMatchNull = $nbMatchNull;

        return $this;
    }
}
