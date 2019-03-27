<?php

namespace App\DataFixtures;


use App\Entity\Equipe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ClassementClubFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i=0; $i<100;$i++){
            $club = new Equipe();
            $club
                ->setNbMatchPerdu($faker->numberBetween(2,20))
                ->setNbMatchJoue($faker->numberBetween(2,20))
                ->setNbMatchGagne($faker->numberBetween(2,20))
                ->setNom($faker->words(1,true))
                ->setLigue($faker->numberBetween(1,2))
                ->setPays($faker->country)
                ->setPoints();
            $manager->persist($club);
        }



        $manager->flush();
    }
}
