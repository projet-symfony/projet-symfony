<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Utilisateur;
use Faker\Factory;

class UtilisateurFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i=0; $i<100;$i++){
            $pronostiqueur = new Utilisateur();
            $pronostiqueur
                ->setLogin($faker->userName  )
                ->setPassword($faker->password )
                ->setNbrePronostiques($faker->numberBetween(1,500))
                ->setNom($faker->lastName )
                ->setPrenom($faker->firstName);

            $nbre = $pronostiqueur->getNbrePronostiques();
            $pronostiqueur->setNbreReussite($faker->numberBetween(1,$nbre))
                ->setTauxReussite();
            $manager->persist($pronostiqueur);
        }
        $manager->flush();
    }
}
