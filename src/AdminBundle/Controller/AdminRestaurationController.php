<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of AdminRestaurationController
 *
 * @author vivien
 */
class AdminRestaurationController extends Controller{
    /**
     * @Route("/admin/salon",name="adminResto")
     * @Template("AdminBundle::adminResto.html.twig")
     * 
     */
    public function indexResto() {
        
    }
    
    
}
