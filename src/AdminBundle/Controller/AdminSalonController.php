<?php

namespace AdminBundle\Controller;

use AdminBundle\Entity\Salon;
use AdminBundle\Form\SalonType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminSalonController extends Controller {

    
//    afichage entity 
    
    /**
     * @Route("/admin/salon", name="adminSalon")
     * @Template("AdminBundle::adminSalon.html.twig")
     */
    public function indexSalon() {
        $em = $this->getDoctrine()->getManager();
        $salon = $em->getRepository("AdminBundle:Salon")->findAll();
        return $this->render('AdminBundle::adminSalon.html.twig', array("salons" => $salon));
        
    }
    
//     Ajout 1 Vue+Form
    /**
     * @Route("/admin/salon/add", name="adminSalonAdd")
     * @Template("AdminBundle::adminSalonAdd.html.twig")
     */
    public function addSalon() {
        
         $f = $this->createForm(SalonType::class,new Salon());
     return array("formNews" => $f->createView());
    }  
    
//     Ajout 2 validation + envoi 
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
    
    
//    Supprimer entity 
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
    
    
// Modif  1 Vue+Form
    /**
     * @Route("admin/salon/edit/{id}",name="editSalon")
     * @Template("AdminBundle::adminSalonModif.html.twig")
     * 
     */
    public function editSalon($id,Salon $a){
                
        return array("formSalon" => $this->createForm(SalonType::class,$a)->createView(),'id'=>$id,);
        
        
        
    }
    
//////    Modif 2 validation + envoi 
    /**
     * @Route("admin/salon/update/{id}",name="modifSalon")
     */
    public function uptdateSalon(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();  // initialisation Entity manager
       
////// Sauvgarde ArticleImage de l'entity en DB 
        $aImg = $em->find("AdminBundle:Salon", $id);
        $image_courante = $aImg->getPhoto();
        
        if ($request->getMethod() == 'POST') {
            $a = new Salon();


            $a = $em->find("AdminBundle:Salon", $id);
            $f = $this->createForm(SalonType::class, $a);
            $f->handleRequest($request);

            if ($a->getPhoto() == null) { //Si on ne veut pas changer d'image
                $a->setPhoto($image_courante); //On laisse l'ancienne image
            }else{ //Sinon on change l'image 
                 $nomDuFichier = md5(uniqid()) . '.' . $a->getPhoto()->getClientOriginalExtension();
                $a->getPhoto()->move('../web/images', $nomDuFichier);
                $a->setPhoto($nomDuFichier);
            }

            $em->merge($a);
            $em->flush();

            return $this->redirect($this->generateUrl('adminSalon'));
        }
    }

}
