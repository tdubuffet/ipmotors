<?php

namespace IPMotors\UserBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\UserEvent;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class RegistrationConfirmListener implements EventSubscriberInterface {

    private $router;

    public function __construct(UrlGeneratorInterface $router) {
        $this->router = $router;
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents() {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationConfirm',
        );
    }

    public function onRegistrationConfirm(FormEvent $event) {

        $url = $this->router->generate('ip_motors_users_list');

        $event->setResponse(new RedirectResponse($url));
    }

}
