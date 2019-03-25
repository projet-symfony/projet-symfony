<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VoteRepository")
 */
class Vote
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
    private $idMatch;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbVote;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Vote1;
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $VoteN;
/**
 * @ORM\Column(type="integer", nullable=true)
 */
    private $Vote2;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMatch(): ?int
    {
        return $this->idMatch;
    }

    public function setIdMatch(int $idMatch): self
    {
        $this->idMatch = $idMatch;

        return $this;
    }

    public function getNbVote(): ?int
    {
        return $this->nbVote;
    }

    public function setNbVote(?int $nbVote): self
    {
        $this->nbVote = $nbVote;

        return $this;
    }

    public function getVote1(): ?int
    {
        return $this->Vote1;
    }

    public function setVote1(?int $Vote1): self
    {
        $this->Vote1 = $Vote1;

        return $this;
    }
    public function getVoteN(): ?int
    {
        return $this->VoteN;
    }

    public function setVoteN(?int $voteN): self
    {
        $this->VoteN = $voteN;

        return $this;
    }
    public function getVote2(): ?int
    {
        return $this->Vote2;
    }

    public function setVote2(?int $Vote2): self
    {
        $this->Vote2 = $Vote2;

        return $this;
    }


}
