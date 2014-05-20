<?php

namespace IPMotors\StrenghsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ORM;

use IPMotors\StrenghsBundle\Entity\Strenghs;
use IPMotors\StrenghsBundle\Form\StrenghsType;

class DefaultController extends Controller {

    public function indexAction() {
        $strenghs = array();
        
        try {
            $strenghs = $this->getDoctrine()
                    ->getRepository('IPMotorsStrenghsBundle:Strenghs')
                    ->findAll();
        } catch (ORM\NoResultException $e) {
            return $this->render('IPMotorsStrenghsBundle:Default:index.html.twig', array(
                        'strenghs' => $strenghs
            ));
        }

        return $this->render('IPMotorsStrenghsBundle:Default:index.html.twig', array(
                    'strenghs' => $strenghs
        ));
    }

    public function createAction() {
        $strenghs = new Strenghs();
        $form = $this->createForm(new StrenghsType(), $strenghs);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();                
                $em->persist($strenghs);
                $em->flush();

                return $this->redirect($this->generateUrl('ip_motors_strenghs_homepage'));
            }
        }

        if (!$strenghs) {
            throw $this->createNotFoundException(
                    'Aucun client trouvé pour cet id : ' . $id
            );
        }

        return $this->render('IPMotorsStrenghsBundle:Default:create.html.twig', array(
                    'strenghs' => $strenghs,
                    'form' => $form->createView(),
        ));
    }

    public function updateAction($id) {
        $strenghs = $this->getDoctrine()
                ->getRepository('IPMotorsStrenghsBundle:Strenghs')
                ->find($id);

        $form = $this->createForm(new StrenghsType(), $strenghs);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($strenghs);
                $em->flush();

                return $this->redirect($this->generateUrl('ip_motors_customer_homepage'));
            }
        }

        if (!$strenghs) {
            throw $this->createNotFoundException(
                    'Aucun client trouvé pour cet id : ' . $id
            );
        }

        return $this->render('IPMotorsCustomerBundle:Default:update.html.twig', array(
                    'strenghs' => $strenghs,
                    'form' => $form->createView(),
        ));
    }

    public function deleteAction($id) {
        $strenghs = $this->getDoctrine()
                ->getRepository('IPMotorsStrenghsBundle:Strenghs')
                ->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($strenghs);
        $em->flush();

        return $this->redirect($this->generateUrl('ip_motors_strenghs_homepage'));
    }

}
