<?php

namespace IPMotors\ChoicesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IPMotorsChoicesBundle:Default:index.html.twig', array('name' => $name));
    }
}
