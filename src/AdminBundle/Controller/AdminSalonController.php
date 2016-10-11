<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Salon;
use AdminBundle\Form\SalonType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminSalonController extends Controller {

    /**
     * @Route("/admin/salon", name="adminSalon")
     * @Template("AdminBundle::adminSalon.html.twig")
     */
    public function indexSalon() {
        $em = $this->getDoctrine()->getManager();
        $salon = $em->getRepository("AdminBundle:Salon")->findAll();
        return $this->render('AdminBundle::adminSalon.html.twig', array("salons" => $salon));
        
    }
    
    /**
     * @Route("/admin/salon/add", name="adminSalonAdd")
     * @Template("AdminBundle::adminSalonAdd.html.twig")
     */
    public function addSalon() {
        
         $f = $this->createForm(SalonType::class,new Salon());
     return array("formNews" => $f->createView());
    }  
    
    /**
     * @Route("/admin/salon/get", name="valid")
     */
    public function getSalon(Request $request) {
        
        $salon = new Salon();
        
         $f = $this->createForm(SalonType::class,$salon);
         $f->handleRequest($request);
         $nomDuFichier = md5(uniqid()).'.'.$salon->getPhoto()->getClientOriginalExtension();
         $salon->getPhoto()->move('../web/images',$nomDuFichier);
         $salon->setPhoto($nomDuFichier);
         $em = $this->getDoctrine()->getManager();
         $em->persist($salon);
         $em->flush();
         
          return $this->redirect($this->generateUrl('adminSalon'));
          
    }  
    /**
     * 
     * @Route("/admin/salon/delete/{id}", name="suprSalon")
     */
    public function deleteAction($id){
        $em = $this->getDoctrine()->getEntityManager();
        $recupId = $em->find("AdminBundle:Salon", $id);
        $em->remove($recupId);
        $em->flush();
        return $this->redirect($this->generateUrl('adminSalon'));
    }
    
    
  // Modif 
    /**
     * @Route("admin/salon/edit/{id}",name="editSalon")
     * @Template("AdminBundle::adminSalonModif.html.twig")
     * 
     */
    public function editSalon($id,Salon $a){
        
        return array("formSalon" => $this->createForm(SalonType::class, $a)->createView(),'id'=>$id);
        
        
        
    }
    
     
   /**
    * @Route("admin/salon/update/{id}",name="modifSalon")
    */
   public function  uptdateSalon(Request $request , $id){
        $a = new Salon();
        $em = $this->getDoctrine()->getManager();
        $a = $em->find("AdminBundle:Salon", $id);
        
         $nomDuFichier = md5(uniqid()).'.'.$a->getPhoto()->getClientOriginalExtension();
         $a->getPhoto()->move('../web/images',$nomDuFichier);
         $a->setPhoto($nomDuFichier);
         
        $f= $this->createForm(SalonType::class,$a);
        $f->handleRequest($request);
        
//        if($f->isValid())
//        {
//        
            
        $em->merge($a);
        $em->flush();
//        }
        return $this->redirect($this->generateUrl('adminSalon'));
   }
        
    }
    

  
     