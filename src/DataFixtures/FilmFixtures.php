<?php

namespace App\DataFixtures;

use App\Entity\Film;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class FilmFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 10; $i++){

            $film = new Film();

            $faker = \Faker\Factory::create();
            $faker->addProvider(new \Xylis\FakerCinema\Provider\Movie($faker));

            $film = $faker->movie;
            $film = $film->setDuree(rand(60, 180));

        }

        $manager->flush();
    }
}
