<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24/03/2019
 * Time: 02:03
 */

namespace App\Entity;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints as Assert;


class RechercheClassementEquipe extends AbstractController
{
    /**
     * @var string|null
     * @Assert\Type(
     *     type="string",
     *     message="The value {{ value }} is not a valid {{ type }}."
     * )
     */
    private $pays;


    /**
     * @var integer|null
     * @Assert\Range(min=1, max=2)
     */
    private $ligue;

    /**
     * @return string|null
     */
    public function getPays(): ?string
    {
        return $this->pays;
    }

    /**
     * @param string|null $pays
     */
    public function setPays(string $pays): void
    {
        $this->pays = $pays;
    }

    /**
     * @return int|null
     */
    public function getLigue(): ?int
    {
        return $this->ligue;
    }

    /**
     * @param int|null $ligue
     */
    public function setLigue(int $ligue): void
    {
        $this->ligue = $ligue;
    }





}