<?php

namespace IPMotors\MarketingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Doctrine\ORM;

//use IPMotors\MarketingBundle\Entity\Marketing;
//use IPMotors\MarketingBundle\Form\MarketingType;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $strenghs = array();
        
        $surveys = array();
        
        try {
         $strenghs = $this->getDoctrine()
                    ->getRepository('IPMotorsStrenghsBundle:Strenghs')
                    ->findAll();
        } catch (ORM\NoResultException $e) 
        {
            $msg= array('error'=>'Pas point fort');
        }
        
       try {
         $surveys = $this->getDoctrine()
                    ->getRepository('IPMotorsFormEditBundle:Survey')
                    ->findAll();
        } catch (ORM\NoResultException $e) 
        {
            $msg= array('error'=>'enquete non trouver');
        }
        return $this->render('IPMotorsMarketingBundle:Default:index.html.twig', 
                            array( 
                           'strenghs' =>$strenghs,
                           'surveys' =>$surveys,     
                           ));
    }
    
    
}
