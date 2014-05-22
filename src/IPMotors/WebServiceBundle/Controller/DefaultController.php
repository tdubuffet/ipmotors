<?php

namespace IPMotors\WebServiceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use IPMotors\FormEditBundle\Entity\SurveyRepository;

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
            
            $idSurvey = $this->getDoctrine()
                             ->getRepository('IPMotorsFormEditBundle:Survey')
                             ->getCurrent()
                             ->getId();
            
            $customers = $this->getDoctrine()
                              ->getRepository('IPMotorsCustomerBundle:Customer')
                              ->findAll();
            
            try{
                $customerExist = $this->getDoctrine()
                                      ->getRepository('IPMotorsFormEditBundle:Survey')
                                      ->findBy(array(
                                          'email'    => $request->request->get('email'),
                                          'idSurvey' => $idSurvey
                                      ));
                $message = array(
                    'error' => 'Vous vous êtes déjà inscrit à l\'enquête.'
                );
                
            } catch(Doctrine\ORM\NoResultException $e){
                $customer->setNom($request->request->get('name'))
                         ->setPrenom($request->request->get('surname'))
                         ->setAdresse($request->request->get('adress'))
                         ->setTelephone($request->request->get('tel'))
                         ->setDateNaissance($request->request->get('birthday'))
                         ->setEmail($request->request->get('email'))
                         ->setBrandVehicule($request->request->get('brand'))
                         ->setTypeVehicule($request->request->get('type'))
                         ->setModelVehicule($request->request->get('model'));

                $choices->setChoixUn($request->request->get('choix1'))
                        ->setChoixDeux($request->request->get('choix2'))
                        ->setChoixTrois($request->request->get('choix3'))
                        ->setChoixQuatre($request->request->get('choix4'))
                        ->setChoixCinq($request->request->get('choix5'))
                        ->setChoixSix($request->request->get('choix6'));

                try {

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($customer);
                    $em->persist($choices);
                    $em->flush();

                } catch ( \Exception $e ) {
                    $message = array(
                        'error' => 'Impossible d\'enregistrer les données'
                    );
                }
            }
            
        }
        
        $message = array(
            'success' => "Enregistrement validé."
        );
        
        $response = new JsonResponse($message);
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }

}
