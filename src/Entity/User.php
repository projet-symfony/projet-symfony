<?php
namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\User)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     */
    private $pseudo;
    /**
     * @ORM\Column(type="text")
     */
    private $password;
    /**
     * @ORM\Column(type="password")
     */

    public function __construct()
    {

    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }
    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;
        return $this;
    }
    public function setPassword(string $password): self
        {
            $this->password = $password;
            return $this;
        }


}