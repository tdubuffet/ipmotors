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
    
    public function query_to_csv($array, $filename, $attachment = false) {
        
        if($attachment) {
            header( 'Content-Type: text/csv' );
            header( 'Content-Disposition: attachment;filename='.$filename);
            header("Content-Type: application/force-download; name=\"" . basename($file) . "\""); 
            header("Content-Transfer-Encoding: binary"); 
            header("Expires: 0"); 
            header("Cache-Control: no-cache, must-revalidate"); 
            header("Pragma: no-cache"); 
            $fp = fopen('php://output', 'w');
        } else {
            $fp = fopen($filename, 'w');
        }
        fputcsv($fp, $array);
        
        fclose($fp);
    }
    
    
}
