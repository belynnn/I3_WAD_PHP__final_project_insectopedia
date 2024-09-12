<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Insecte;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class InsecteFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_BE');

        for ($i = 0; $i < 50; $i++) {
            $insecte = new Insecte([
                'nomInsecte' => $faker->word(),
            ]);
            $manager->persist($insecte);
        }
        $manager->flush();
    }
}