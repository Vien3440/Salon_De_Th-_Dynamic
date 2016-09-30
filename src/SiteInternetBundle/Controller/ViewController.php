<?php

namespace SiteInternetBundle\Controller;

use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ViewController extends Controller
{
    /**
     * @Route("/home")
     * @Template("SiteInternetBundle::home.html.twig")
     * 
     */
    public function getHome()
    {
        return ;
    }
    
    /**
     * @Route("salon")
     * @Template("SiteInternetBundle::salondethe.html.twig")
     */
    public function getSalon() {
        
        // Appel de l'entity
         $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AdminBundle:Salon', 'black');
        $query = $em->createNativeQuery("select * from salon", $rsm);
        $niouzes = $query->getResult();
        return array('poste' => $niouzes);   
        
        
        
    }
    
    
    
    /**
     * @Route("/patisserie")
     * @Template("SiteInternetBundle::patisserie.html.twig")
     */
    public function getPati() {
        
    }
    
    /**
     * @Route("/restauration")
     * @Template("SiteInternetBundle::restauration.html.twig")
     */
    public function getRestauration() {
        
            // Appel de l'entity
         $em = $this->getDoctrine()->getEntityManager();
        $rsm = new ResultSetMappingBuilder($em);
        $rsm->addRootEntityFromClassMetadata('AdminBundle:Resto', 'gg');
        $query = $em->createNativeQuery("select * from resto", $rsm);
        $niouzes = $query->getResult();
        return array('resto' => $niouzes);   
        
        
    }
    
    
    /**
     * @Route("/contact")
     * @Template("SiteInternetBundle::contact.html.twig")
     */
    public function getContact() {
        
    }
}
