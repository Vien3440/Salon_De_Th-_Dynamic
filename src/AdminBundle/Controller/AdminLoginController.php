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
use Symfony\Component\Config\Definition\Exception\Exception;


/**
 * Description of AdminLoginController
 *
 * @author vivien
 */
class AdminLoginController extends Controller {
    
    
    /**
     * @Route("/login",name="login")
     * @Template("AdminBundle::adminLogin.html.twig")
     */
    public function getLogin() {
        
        
    }
    

   /**
     * 
     * @Route("/loginCheck",name="loginCheck")
     * @throws Exception
     */
    public function check() {
        throw new Exception('Verifiez votre fichier security');
    }
    
    /**
     * 
     * @Route("/loginOut",name="loginOut")
     * @throws Exception
     */
    public function logout() {
        throw new Exception('Verifiez votre fichier security');
    }
    
    
}
