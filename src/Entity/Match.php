<?php

namespace App\Entity;

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

    /**
     * @ORM\Column(type="integer")
     */
    private $idclub1;
    /**
     * @ORM\Column(type="text")
     */
    private $nomstade;
    /**
     * @ORM\Column(type="text")
     */
    private $idclub2;


    /**
     * @ORM\Column(type="datetime")
     */
    private $datetime;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getIdclub1(): ?int
    {
        return $this->idclub1;
    }
    public function getIdclub2(): ?int
    {
        return $this->idclub2;
    }
    public function getNomStade(): ?int
    {
        return $this->nomstade;
    }
    public function getdatetime(): ?int
{
    return $this->datetime;
}

}
