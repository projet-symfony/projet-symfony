<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 07/04/2019
 * Time: 12:41
 */

namespace App\DataFixtures;
use DateTimeInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use app\entity\Jeu;

class JeuFixture extends Fixture
{
    private $Equipe;
    private $Utilisateur;
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++) {
            $jeu = new Jeu();
            $jeu
                ->setLieu($faker->address())
                ->setDate($faker->dateTimeBetween('now', 'next thursday'))
                ->setScore($faker->numberBetween(0,2))
                ->setIdEquipe1($this->getReference('eq'))
                ->setIdEquipe2($this->getReference('eq2'));
             /*   ->setIdEquipe1($this->Equipe[rand(0, count($this->Equipe))])
                ->setIdEquipe2($this->Equipe[rand(0, count($this->Equipe))]);*/
            $manager->persist($jeu);
        }
        $manager->flush();
    }
    public function getDependencies()
    {
        return array(
            EquipeFixtures::class
        );
    }
}