<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class EntrepriseFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {


        $faker = Faker\Factory::create('fr_FR');
        for ($i=0;$i<20;$i++) {
            $entreprise = new Entreprise();
            $entreprise->setDesignation($faker->lastName);
            $manager->persist($entreprise);

            $manager->persist($entreprise);
        }
        $manager->flush();
    }
}
