<?php

namespace IPMotors\MailBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use IPMotors\MailBundle\Form\MailType;
use IPMotors\MailBundle\Entity\Mail;

class MailController extends Controller {

    public function listAction() {


        $em = $this->getDoctrine()->getManager();
        $mailings = $em->getRepository('IPMotorsMailBundle:Mail')->findAll();


        return $this->render('IPMotorsMailBundle:Mail:list.html.twig', array('mailings' => $mailings));
    }

    public function addAction() {

        $mail = new Mail();
        $form = $this->createForm(new MailType, $mail);


        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($mail);
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Le mailing a bien été enregistré');
                return $this->redirect($this->generateUrl('ip_motors_mail_list'));
            }
        }



        return $this->render('IPMotorsMailBundle:Mail:add.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function editAction(Mail $mail) {

        $form = $this->createForm(new MailType, $mail);

        $mailId = $mail->getId();


        $request = $this->getRequest();

        if ($request->getMethod() == "POST") {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->flush();
                $this->get('session')->getFlashBag()->add('info', 'Les paramètres ont bien été modifiés');
            }
        }



        return $this->render('IPMotorsMailBundle:Mail:edit.html.twig', array(
                    'form' => $form->createView(),
                    'mailId' => $mailId
        ));
    }

    public function testAction(Mail $mail) {


        $myMail = $this->container->get('security.context')->getToken()->getUser()->getEmail();

        $message = \Swift_Message::newInstance()
                ->setSubject($mail->getTitle())
                ->setFrom($mail->getExpeditor())
                ->setTo($myMail)
                ->setBody($mail->getContent())
        ;

        $this->get('session')->getFlashBag()->add('info', 'Le mail test a bien été envoyé');
        $this->get('mailer')->send($message);

        return $this->redirect($this->generateUrl('ip_motors_mail_list'));
    }

    public function deleteAction(Mail $mail) {

        $em = $this->getDoctrine()->getManager();
        $em->remove($mail);
        $em->flush();
        $this->get('session')->getFlashBag()->add('info', 'Le mailing a bien été supprimé');


        return $this->redirect($this->generateUrl('ip_motors_mail_list'));
    }

}
