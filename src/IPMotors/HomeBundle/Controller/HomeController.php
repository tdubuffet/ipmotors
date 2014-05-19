<?php

namespace IPMotors\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('IPMotorsHomeBundle:Home:index.html.twig', array());
    }
}
