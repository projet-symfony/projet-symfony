<?php

namespace App\DataFixtures;
use App\Entity\Equipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Faker\Factory;

class EquipeFixture extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i=0; $i<100;$i++){
            $club = new Equipe();
            $club2 = new Equipe();
            $club
                ->setNbMatchPerdu($faker->numberBetween(2,20))
                ->setNbMatchJoue($faker->numberBetween(2,20))
                ->setNbMatchGagne($faker->numberBetween(2,20))
                ->setNomEquipe($faker->words(1,true))
                ->setLigue($faker->numberBetween(1,2))
                ->setPays($faker->country)
                ->setPoints();
            $club2
                ->setNbMatchPerdu($faker->numberBetween(2,20))
                ->setNbMatchJoue($faker->numberBetween(2,20))
                ->setNbMatchGagne($faker->numberBetween(2,20))
                ->setNomEquipe($faker->words(1,true))
                ->setLigue($faker->numberBetween(1,2))
                ->setPays($faker->country)
                ->setPoints();
            $this->setReference('eq', $club);
            $this->setReference('eq2', $club2);
            $manager->persist($club);
            $manager->persist($club2);
        }

        $manager->flush();
    }

}
