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
        header('Access-Control-Allow-Methods: GET, POST');
        header('Access-Control-Max-Age: 1000');
        header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
        
        $request = $this->getRequest();
        
        if ($request->getMethod() == 'POST') {            
            $customer = new \IPMotors\CustomerBundle\Entity\Customer();
            $choices  = new \IPMotors\ChoicesBundle\Entity\Choices();
            
            /**
             * Aucune enquête
             */
            try{
                $idSurvey = $this->getDoctrine()
                                 ->getRepository('IPMotorsFormEditBundle:Survey')
                                 ->getCurrent()->getId();
            } catch (Doctrine\ORM\NonUniqueResultException $e) {
                
                $response = new JsonResponse(array(
                    'error' => 'Aucune enquête en cours'
                ));
                $response->headers->set('Content-Type', 'application/json');

                return $response;
                
            }
            
            
            $val = $this->getDoctrine()
                        ->getRepository('IPMotorsCustomerBundle:Customer')
                        ->findBy(array(
                            'email'    => $request->request->get('email'),
                            'idSurvey' => $idSurvey
                        ));
            
            /**
             * Déja inscrit à l'enquête
             */
            if (count($val) > 0) {
                
                $response = new JsonResponse(array(
                    'error' => 'Vous vous êtes déjà inscrit à l\'enquête.'
                ));
                
                $response->headers->set('Content-Type', 'application/json');

                return $response;
            }
            
            $customer->setNom           ($request->request->get('name'))
                    ->setPrenom         ($request->request->get('surname'))
                    ->setAdresse        ($request->request->get('adress'))
                    ->setTelephone      ($request->request->get('tel'))
                    ->setDateNaissance  (new \DateTime($request->request->get('birthday')))
                    ->setEmail          ($request->request->get('email'))
                    ->setBrandVehicule  ($request->request->get('brand'))
                    ->setTypeVehicule   ($request->request->get('type'))
                    ->setModelVehicule  ($request->request->get('model'))
                    ->setIdSurvey       ($idSurvey)
                    ->setPostal         ($request->request->get('codePostal'))
                    ->setTown           ($request->request->get('town'))
                    ->setChoix1         ($request->request->get('choix1'))
                    ->setChoix2         ($request->request->get('choix2'))
                    ->setChoix3         ($request->request->get('choix3'))
                    ->setChoix4         ($request->request->get('choix4'))
                    ->setChoix5         ($request->request->get('choix5'))
                    ->setChoix6         ($request->request->get('choix6'));
           
            try {

                $em = $this->getDoctrine()->getManager();
                $em->persist($customer);
                $em->flush();

                $message = array(
                    'success' => "Enregistrement de l'enquête validé."
                );

            } catch (Doctrine\ORM\ORMException $e ) {
                $message = array(
                    'error' => 'Impossible d\'enregistrer les données' . $e->getMessage()
                );
            }
        } else {
            $message = array(
                'error' => 'Aucune données: ' . $e->getMessage()
            );
        }
        
        $response = new JsonResponse($message);

        $response->headers->set('Content-Type', 'application/json');

        return $response;
        
    }

}
