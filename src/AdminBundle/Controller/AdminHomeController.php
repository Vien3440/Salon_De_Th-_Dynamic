<?php

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



class AdminHomeController extends Controller{
    
    /**
     * @Route("/admin/home")
     * @Template("AdminBundle::adminHome.html.twig")
     * 
     */
    public function getHome()
    {
        return ;
    }
    
}