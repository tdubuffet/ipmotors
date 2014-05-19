<?php

namespace IPMotors\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IPMotorsHomeBundle:Home:index.html.twig', array('name' => $name));
    }
}
