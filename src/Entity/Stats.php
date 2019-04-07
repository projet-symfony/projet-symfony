<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StatsRepository")
 */
class Stats
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
    private $jeu_id;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Jeu",inversedBy="stats")
     * @JoinColumn(name="jeu_id", referencedColumnName="id")
     */
    private $jeu;
    /**
     * @ORM\Column(type="integer")
     */
    private $equipe_id;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe",inversedBy="stats")
     * @JoinColumn(name="equipe_id", referencedColumnName="id")
     */
    private $equipe;
    /**
     * @ORM\Column(type="integer")
     */
    private $type_id;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type",inversedBy="stats")
     * @JoinColumn(name="type_id", referencedColumnName="id")
     */
    private $type;
    /**
     * @ORM\Column(type="integer")
     */
    private $value;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJeuId(): ?int
    {
        return $this->jeu_id;
    }

    public function setJeuId(int $jeu_id): self
    {
        $this->jeu_id = $jeu_id;

        return $this;
    }

    public function getEquipeId(): ?int
    {
        return $this->equipe_id;
    }

    public function setEquipeId(int $equipe_id): self
    {
        $this->equipe_id = $equipe_id;

        return $this;
    }

    public function getTypeId(): ?int
    {
        return $this->type_id;
    }

    public function setTypeId(int $type_id): self
    {
        $this->type_id = $type_id;

        return $this;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * @return mixed
     */
    public function getJeu()
    {
        return $this->jeu;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }
}
