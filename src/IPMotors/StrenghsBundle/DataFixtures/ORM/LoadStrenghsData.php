<?php


namespace IPMotors\StrenghsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IPMotors\StrenghsBundle\Entity\Strenghs;

class LoadStrenghsData implements FixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {
        $strenghs = array(
            'Voiture confortable',
            'Bonne habitabilité',
            'Design à forte personnalité',
            'Grande modularité',
            'Tenue de route saine',
            'Équipement complet',
            'Qualités routières',
            'Habitacle spacieux',
            'Finition',
            'Coffre généreux',
        );

        sort($strenghs);


        foreach ($strenghs as $i => $strengh) {
            $strenghsList[$i] = new Strenghs();
            $strenghsList[$i]->setName($strengh);

            $manager->persist($strenghsList[$i]);
        }

        $manager->flush();
    }

}
