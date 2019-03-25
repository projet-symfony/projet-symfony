<?php

namespace App\DataFixtures;

use App\Entity\ClassementClub;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ClassementClubFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i=0; $i<100;$i++){
            $club = new ClassementClub();
            $club
                ->setNul($faker->numberBetween(2,20))
                ->setPerdu($faker->numberBetween(2,20))
                ->setJoue($faker->numberBetween(2,20))
                ->setGagne($faker->numberBetween(2,20))
                ->setClub($faker->words(1,true))
                ->setLigue($faker->numberBetween(1,2))
                ->setPays($faker->country)
                ->setPoints();
            $manager->persist($club);
        }



        $manager->flush();
    }
}
