<?php

namespace IPMotors\SettingsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use IPMotors\SettingsBundle\Form\SettingsType;

class SettingsController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $setting = $em->getRepository('IPMotorsSettingsBundle:Settings')->find(1);


        $form = $this->createForm(new SettingsType, $setting);

        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Les paramètres ont bien été modifiés');
            }
        }
        return $this->render('IPMotorsSettingsBundle:Settings:index.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
