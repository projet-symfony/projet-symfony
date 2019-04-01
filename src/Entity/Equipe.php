<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

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
     * @ORM\Column(type="string", length=255)
     */
    private $NomEquipe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pays;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbMatchJoue;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbMatchGagne;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbMatchPerdu;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbPronostique;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Ligue;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $numero;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $points;


    public function __Construct(){
       $this->numero = 0;
       $this->points=0;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEquipe(): ?string
    {
        return $this->NomEquipe;
    }

    public function setNomEquipe(string $NomEquipe): self
    {
        $this->NomEquipe = $NomEquipe;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(string $Pays): self
    {
        $this->Pays = $Pays;

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

    public function getNbMatchGagne(): ?int
    {
        return $this->nbMatchGagne;
    }

    public function setNbMatchGagne(?int $nbMatchGagne): self
    {
        $this->nbMatchGagne = $nbMatchGagne;

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

    public function getNbPronostique(): ?int
    {
        return $this->nbPronostique;
    }

    public function setNbPronostique(?int $nbPronostique): self
    {
        $this->nbPronostique = $nbPronostique;

        return $this;
    }

    public function getLigue(): ?int
    {
        return $this->Ligue;
    }

    public function setLigue(int $Ligue): self
    {
        $this->Ligue = $Ligue;

        return $this;
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

    public function getPoints(): ?int
    {
        return $this->points;
    }


    public function setPoints(): self
    {
        $this->points += ($this->nbMatchGagne * 3) ;
        return $this;
    }


    public function __toString()
    {
       return $this->NomEquipe;
    }


}
