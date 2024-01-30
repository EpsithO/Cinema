<?php

namespace App\DataFixtures;

use App\Entity\Seance;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
;

class SeanceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $seance = new Seance();
        for ($i = 0; $i < 10; $i++) {
            $seance->setDateProjection(new \DateTime());
            $seance->setTarifNormal(25);
            $seance->setTarifReduit(15);
            $manager->persist($seance);
        }

        $manager->flush();
    }
}
