<?php

namespace IPMotors\MailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use IPMotors\MailBundle\Form\MailType;

class MailController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getManager();
        $mail = $em->getRepository('IPMotorsMailBundle:Mail')->find(1);


        $form = $this->createForm(new MailType, $mail);


        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Les paramètres ont bien été modifiés');
            }
        }



        return $this->render('IPMotorsMailBundle:Mail:index.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function testAction() {

        $em = $this->getDoctrine()->getManager();
        $mail = $em->getRepository('IPMotorsMailBundle:Mail')->find(1);

        $message = \Swift_Message::newInstance()
                ->setSubject('Hello Email')
                ->setFrom('send@example.com')
                ->setTo('recipient@example.com')
                ->setBody($this->renderView('HelloBundle:Hello:email.txt.twig', array('name' => $name)))
        ;
        $this->get('mailer')->send($message);
    }

}
