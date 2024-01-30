<?php

namespace App\DataFixtures;

use App\Entity\Salle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class SalleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $salle = new Salle();
        for ($i = 0; $i < 10; $i++) {
            $salle->setNom("Salle $i");
            // nombre de place aléatoire entre 10 et 100
            $salle->setNombrePlace(rand(10, 100));
            $manager->persist($salle);
        }

        $manager->flush();
    }
}
