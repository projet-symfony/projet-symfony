<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 24/03/2019
 * Time: 02:03
 */

namespace App\Entity;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RechercheClassement extends AbstractController
{
    /**
     * @var string|null
     */
    private $pays;


    /**
     * @var integer|null
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