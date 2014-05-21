<?php

namespace IPMotors\WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller {

    public function mailAction($mail) {
        /**
         * BOUCHON mail
         */
        $contentMail = "toto"; // Content mail

        $response = new JsonResponse(array('mail' => $mail));
        $response->headers->set('Content-Type', 'application/json');

//        $message = \Swift_Message::newInstance()
//                ->setSubject('Export Mail')
//                ->setFrom('admin@ipmotors.com')
//                ->setTo('cavannachristophe@gmail.com')
//                ->setBody($contentMail)
//        ;
//        $this->get('mailer')->send($message);

        return $response;
    }
    
    public function getDataAction(){
        
    }

}
