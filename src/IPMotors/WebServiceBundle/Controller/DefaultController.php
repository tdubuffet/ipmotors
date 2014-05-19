<?php

namespace IPMotors\WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('IPMotorsWebServiceBundle:Default:index.html.twig', array('name' => $name));
    }
}
