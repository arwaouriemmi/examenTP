<?php

namespace App\DataFixtures;

use App\Entity\Entreprise;
use App\Entity\Pfe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;
class PfeFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('fr_FR');


        for ($i=0;$i<20;$i++) {
            $pfe= new pfe();
            $pfe->setTitle($faker->lastName);
            $pfe->setNb($faker->biasedNumberBetween(10,20));
            $repository = $manager->getRepository(Entreprise::class) ;
            $ra=rand(10,15);
            $t=$repository->findby(['id'=>'$ra'],[]);
            $pfe->setEntreprise($t);
            $manager->persist($pfe);
        }
        $manager->flush();
    }
}
