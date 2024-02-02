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
        for ($i = 0; $i < 10; $i++) {

            $salle = new Salle();
            $salle->setNom("Salle $i");
            $salle->setNombrePlace(rand(10, 100));
            $manager->persist($salle);
        }

        $manager->flush();
    }
}
