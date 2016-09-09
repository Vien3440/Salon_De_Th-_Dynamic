<?php

namespace SiteInternetBundle\Controller;

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
     * @Route("/salon")
     * @Template("SiteInterntetBundle::salondethe.html.twig")
     */
    public function getSalon() {
        return null;
        
    }
    /**
     * @Route("/patisserie")
     * @Template("SiteInternetBundle::patisserie.html.twig")
     */
    public function getPati() {
        
    }
    /**
     * @Route("/contact")
     * @Template("SiteInternetBundle::contact.html.twig")
     */
    public function getContact() {
        
    }
}
