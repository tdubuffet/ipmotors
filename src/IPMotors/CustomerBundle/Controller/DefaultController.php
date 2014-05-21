<?php

namespace IPMotors\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use IPMotors\CustomerBundle\Entity\Customer;
use IPMotors\CustomerBundle\Form\CustomerType;

class DefaultController extends Controller {

    public function indexAction() {
        
        $customers = array();
        
        if ($name = $this->get('request')->get('seek')) {

            $name = $this->get('request')
                    ->get('seek');
            $em = $this->getDoctrine()
                    ->getManager();

            $repo = $em->getRepository("IPMotorsCustomerBundle:Customer");
            try {
                $customers = $repo->search($name);
            } catch (\Doctrine\ORM\NoResultException $e) {
                return $this->render('IPMotorsCustomerBundle:Default:index.html.twig', array(
                    'customers' => $customers
                ));
            }
        } else {
            $customers = $this->getDoctrine()
                    ->getRepository('IPMotorsCustomerBundle:Customer')
                    ->findAll();

            
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
            return $this->redirect($this->generateUrl('ip_motors_customer_homepage'));
        }

        return $this->render('IPMotorsCustomerBundle:Default:read.html.twig', array(
                    'customer' => $customers
        ));
    }

    public function updateAction($id) {
        $customer = $this->getDoctrine()
                ->getRepository('IPMotorsCustomerBundle:Customer')
                ->find($id);

        $form = $this->createForm(new CustomerType(), $customer);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($customer);
                $em->flush();

                return $this->redirect($this->generateUrl('ip_motors_customer_homepage'));
            }
        }

        if (!$customer) {
            return $this->redirect($this->generateUrl('ip_motors_customer_homepage'));
        }

        return $this->render('IPMotorsCustomerBundle:Default:update.html.twig', array(
                    'customer' => $customer,
                    'form' => $form->createView(),
        ));
    }

    public function deleteAction($id) {
        $customer = $this->getDoctrine()
                ->getRepository('IPMotorsCustomerBundle:Customer')
                ->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($customer);
        $em->flush();

        return $this->redirect($this->generateUrl('ip_motors_customer_homepage'));
    }

}
