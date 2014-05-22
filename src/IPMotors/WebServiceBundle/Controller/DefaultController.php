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
    
    public function surveyAction(){
        
        $em             = $this->getDoctrine()->getManager();
        $repoSurvery    = $em->getRepository('IPMotorsFormEditBundle:Survey');
        $repoStrenghs   = $em->getRepository('IPMotorsStrenghsBundle:Strenghs');
        
        try {
            $values            = $repoSurvery->getCurrent();
            $strenghsActualIds = explode(':', $values->getActualVehiculStrenghs());
            $strenghsFuturIds  = explode(':', $values->getActualVehiculStrenghs());
            
            $strenghsActual    = array();
            foreach($strenghsActualIds as $idSA) {
                
                $strengh               = $repoStrenghs->findOneById($idSA);
                if (count($strengh) === 1 ) {
                    $strenghsActual[$idSA] = $strengh->getName();
                }
            }
            
            $strenghsFutur    = array();
            foreach($strenghsFuturIds as $idSA) {
                
                $strengh               = $repoStrenghs->findOneById($idSA);
                if (count($strengh) === 1 ) {
                    $strenghsFutur[$idSA] = $strengh->getName();
                }
            }
            
            $survey = array(
                'name'              => $values->getName(),
                'actualVehiculName' => $values->getActualVehiculName(),
                'strenghsVehicul'   => $strenghsActual,
                'actualFuturName'   => $values->getFuturVehiculName(),
                'strenghsFutur'     => $strenghsFutur
            );
            
        } catch (\Doctrine\ORM\NoResultException $e) {
            $survey = array(
                'error' => 'Not result found !'
            );
        } catch (\Doctrine\ORM\NonUniqueResultException $e) {
            $survey = array(
                'error' => 'Not result found !'
            );
        }
        
        
        
        $response = new JsonResponse($survey);
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
        
    }
    
    public function getDataSurveyAction()
    {
        $request = $this->get('request');
        
        if ($request->getMethod() == 'POST') {
            $customer = new \IPMotors\CustomerBundle\Entity\Customer();
            $choices  = new \IPMotors\ChoicesBundle\Entity\Choices();
            
            $customer->setNom($request->request->get('name'));
            $customer->setPrenom($request->request->get('surname'));
            $customer->setAdresse($request->request->get('adress'));
            $customer->setTelephone($request->request->get('tel'));
            $customer->setDateNaissance($request->request->get('birthday'));
            $customer->setEmail($request->request->get('email'));
            $customer->setBrandVehicule($request->request->get('brand'));
            $customer->setTypeVehicule($request->request->get('type'));
            $customer->setModelVehicule($request->request->get('model'));
            
            $choices->setChoixUn($request->request->get('choix1'));
            $choices->setChoixUn($request->request->get('choix2'));
            $choices->setChoixUn($request->request->get('choix3'));
            $choices->setChoixUn($request->request->get('choix4'));
            $choices->setChoixUn($request->request->get('choix5'));
            $choices->setChoixUn($request->request->get('choix6'));
        }
        
        return '1';
    }

}
