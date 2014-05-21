<?php

namespace IPMotors\FormEditBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use IPMotors\FormEditBundle\Entity\Survey;
use IPMotors\FormEditBundle\Form\SurveyType;

class DefaultController extends Controller {

    public function indexAction() {

        $survey = array();

        $survey = $this->getDoctrine()
                ->getRepository('IPMotorsFormEditBundle:Survey')
                ->findAll();

        return $this->render('IPMotorsFormEditBundle:Default:index.html.twig', array(
                    'survey' => $survey,
        ));
    }

    public function createAction() {
        $survey = new Survey();
        $form = $this->createForm(new SurveyType(), $survey);

        $strenghs = $this->getDoctrine()
                ->getRepository('IPMotorsStrenghsBundle:Strenghs')
                ->findAll();

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            if ($this->get('request')->get('survey_name') !== null &&
                    $this->get('request')->get('actualVehiculName') !== null &&
                    $this->get('request')->get('futurVehiculName') !== null) {

                $actualVehiculStrenghs = implode($this->get('request')->get('actual_strenghs_survey', array()), ':');
                $futurVehiculStrenghs = implode($this->get('request')->get('futur_strenghs_survey', array()), ':');

                $survey->setName($this->get('request')->get('survey_name'))
                        ->setActualVehiculName($this->get('request')->get('actualVehiculName'))
                        ->setActualVehiculStrenghs($actualVehiculStrenghs)
                        ->setFuturVehiculName($this->get('request')->get('futurVehiculName'))
                        ->setFuturVehiculStrenghs($futurVehiculStrenghs)
                        ->setMailId(0)
                        ->setActivated(FALSE)
                        ->setDate(new \DateTime());

                $em = $this->getDoctrine()->getManager();
                $em->persist($survey);
                $em->flush();

                return $this->redirect($this->generateUrl('ip_motors_form_edit_homepage'));
            }
        }

        if (!$survey) {
            throw $this->createNotFoundException(
                    'Aucun client trouvé pour cet id : ' . $id
            );
        }

        return $this->render('IPMotorsFormEditBundle:Default:create.html.twig', array(
                    'form' => $form->createView(),
                    'survey' => $survey,
                    'strenghs' => $strenghs,
        ));
    }

    public function updateAction($id) {
        try {
            $survey = $this->getDoctrine()
                    ->getRepository('IPMotorsFormEditBundle:Survey')
                    ->find($id);
        } catch (\Doctrine\ORM\NoResultException $e) {
            return $this->redirect($this->generateUrl('ip_motors_form_edit_homepage'));
        }

        $strenghs = $this->getDoctrine()
                ->getRepository('IPMotorsStrenghsBundle:Strenghs')
                ->findAll();


        $FactualStrenghs = explode(':', $survey->getActualVehiculStrenghs());
        $FfuturStrenghs = explode(':', $survey->getFuturVehiculStrenghs());
        
        $actualStrenghs = array();
        foreach($FactualStrenghs as $strengh) {
            $actualStrenghs[$strengh] = $strengh;
        }
        
        $futurStrenghs = array();
        foreach($FfuturStrenghs as $strengh) {
            $futurStrenghs[$strengh] = $strengh;
        }
        
        $request = $this->get('request');
        
        if ($request->getMethod() == 'POST') {
            if ($this->get('request')->get('survey_name') !== null &&
                    $this->get('request')->get('actualVehiculName') !== null &&
                    $this->get('request')->get('futurVehiculName') !== null) {

                $actualVehiculStrenghs = implode($this->get('request')->get('actual_strenghs_survey', array()), ':');
                $futurVehiculStrenghs = implode($this->get('request')->get('futur_strenghs_survey', array()), ':');

                $survey->setName($this->get('request')->get('survey_name'))
                        ->setActualVehiculName($this->get('request')->get('actualVehiculName'))
                        ->setActualVehiculStrenghs($actualVehiculStrenghs)
                        ->setFuturVehiculName($this->get('request')->get('futurVehiculName'))
                        ->setFuturVehiculStrenghs($futurVehiculStrenghs)
                        ->setMailId(0)
                        ->setActivated(FALSE)
                        ->setDate(new \DateTime());

                $em = $this->getDoctrine()->getManager();
                $em->persist($survey);
                $em->flush();

                return $this->redirect($this->generateUrl('ip_motors_form_edit_homepage'));
            }
        }

        if (!$survey) {
            throw $this->createNotFoundException(
                    'Aucun client trouvé pour cet id : ' . $id
            );
        }
        
        return $this->render('IPMotorsFormEditBundle:Default:update.html.twig', array(
                    'survey' => $survey,
                    'strenghs' => $strenghs,
                    'actualStrenghs' => $actualStrenghs,
                    'futurStrenghs' => $futurStrenghs,
        ));
    }

    public function deleteAction($id) {
        $survey = $this->getDoctrine()
                ->getRepository('IPMotorsFormEditBundle:Survey')
                ->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($survey);
        $em->flush();

        return $this->redirect($this->generateUrl('ip_motors_form_edit_homepage'));
    }

}
