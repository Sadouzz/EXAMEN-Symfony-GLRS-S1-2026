<?php

namespace App\DataFixtures;

use App\Entity\RDV;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RDVFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        /*for($i = 0; $i < 3; $i++) {
            $rdv = new RDV();
            $rdv->setTypeRDV("nom " . $i);
            $rdv->setPrenom("prenom " . $i);
            $rdv->setAdresse("adresse " . $i);
            $rdv->setTelephone("telephone " . $i);
            $rdv->setLogin("login " . $i);
            $rdv->setPassword("password " . $i);
            $manager->persist($rdv);
        }*/
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
