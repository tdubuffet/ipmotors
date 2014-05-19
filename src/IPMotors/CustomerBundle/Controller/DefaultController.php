<?php

namespace IPMotors\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

    public function indexAction() {
        $customers = $this->getDoctrine()
                ->getRepository('IPMotorsCustomerBundle:Customer')
                ->findAll();

        if (!$customers) {
            throw $this->createNotFoundException(' Aucun Customer existant.');
        }

        return $this->render('IPMotorsCustomerBundle:Default:index.html.twig', array(
                    'customers' => $customers
        ));
    }

    public function readAction($id) {
        $customers = $this->getDoctrine()
                ->getRepository('IPMotorsCustomerBundle:Customer')
                ->find($id);

        if (!$customers) {
            throw $this->createNotFoundException(
                    'Aucun client trouvé pour cet id : ' . $id
            );
        }

        return $this->render('IPMotorsCustomerBundle:Default:read.html.twig', array(
                    'customer' => $customers
        ));
    }

}
