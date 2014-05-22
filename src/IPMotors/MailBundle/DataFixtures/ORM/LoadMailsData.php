<?php

namespace IPMotors\StrenghsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use IPMotors\MailBundle\Entity\Mail;

class LoadMailsData implements FixtureInterface {

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager) {

        $mail = new Mail();

        $mail->setTitle('Enquête sur les voitures');
        $mail->setContent('Merci d\'avoir répondu à notre enquête de satisfaction<br />'
                . '
Nous vous remercions d\'avoir consacré quelques instants à répondre à notre enquête de satisfaction.<br />
Votre avis est essentiel pour nous permettre de faire évoluer nos voitures et d\'en cpncevoir de nouveaux, toujours adaptés à vos besoins. ');

        $mail->setExpeditor('enquete@ipmotors.com');

        $manager->persist($mail);
        $manager->flush();
    }

}
