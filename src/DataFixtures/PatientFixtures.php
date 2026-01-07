<?php

namespace App\DataFixtures;

use App\Entity\Patient;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 3; $i++) {
            $patient = new Patient();
            $patient->setNom("nom " . $i);
            $patient->setPrenom("prenom " . $i);
            $patient->setAdresse("adresse " . $i);
            $patient->setTelephone("telephone " . $i);
            $patient->setLogin("login " . $i);
            $patient->setPassword("password " . $i);
            $manager->persist($patient);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
