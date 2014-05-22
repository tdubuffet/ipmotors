<?php

namespace IPMotors\MarketingBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Doctrine\ORM;

class DefaultController extends Controller {

    public function indexAction() {
        
        $strenghs   = array();
        $surveys    = array();
        $towns      = array();
        $brands     = array();
        
        $custoRepo = $this->getDoctrine()
                          ->getRepository('IPMotorsCustomerBundle:Customer');
        
        $towns  = $custoRepo->getTowns();
        $brands = $custoRepo->getBrands();
        try {
            $strenghs = $this->getDoctrine()
                    ->getRepository('IPMotorsStrenghsBundle:Strenghs')
                    ->findAll();
        } catch (ORM\NoResultException $e) {
            $msg = array('error' => 'Pas point fort');
        }

        try {
            $surveys = $this->getDoctrine()
                    ->getRepository('IPMotorsFormEditBundle:Survey')
                    ->findAll();
        } catch (ORM\NoResultException $e) {
            $msg = array('error' => 'enquete non trouver');
        }

        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            
            $va1 = $this->get('request')->get('va1');
            $va2 = $this->get('request')->get('va2');
            $va3 = $this->get('request')->get('va3');
            $va4 = $this->get('request')->get('vf1');
            $va5 = $this->get('request')->get('vf2');
            $va6 = $this->get('request')->get('vf3');
            
            
            
            $data = $custoRepo->exportData(array(
                'va1' => $va1,
                'va2' => $va2,
                'va3' => $va3,
                'va4' => $va4,
                'va5' => $va5,
                'va6' => $va6,
                'ifp1' => $this->get('request')->get('ifp1'),
                'ifp2' => $this->get('request')->get('ifp2'),
                'ifp3' => $this->get('request')->get('ifp3')
            ));
            
            $handle = fopen('php://memory', 'r+');

            foreach ($data as $answer) {
                fputcsv($handle, array($answer));
            }

            rewind($handle);
            $content = stream_get_contents($handle);
            fclose($handle);

            return new \Symfony\Component\HttpFoundation\Response($content, 200, array(
                'Content-Type' => 'application/force-download',
                'Content-Disposition' => 'attachment; filename="export.csv"'
            ));
        }


        return $this->render('IPMotorsMarketingBundle:Default:index.html.twig', array(
            'strenghs' => $strenghs,
            'surveys' => $surveys,
            'towns' => $towns,
            'brands' => $brands
        ));
    }
}
