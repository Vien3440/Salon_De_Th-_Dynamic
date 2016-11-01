<?php

namespace SiteInternetBundle\Controller;

use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Swift_Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class ViewController extends Controller
{
    /**
     * @Route("/home",name="home")
     * @Template("SiteInternetBundle::home.html.twig")
     * 
     */
    public function getHome()
    {
        return array(null);
    }
    
    /**
     * @Route("/salon",name="salon")
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
    
    
   
/////////Formulaire Contact
    /**
     * @Route("conta",name="conta")
     * @Template("SiteInternetBundle::contact.html.twig")
     */
  public function indexAction(Request $request)
{
        
      if ($request->getMethod()=='POST')
      {
          $nom = $_POST['nom'];
          $email = $_POST['email'];
          $corp = $_POST['corp'];
          
    $message = Swift_Message::newInstance()
        ->setSubject($nom)
        ->setFrom($email)
        ->setTo('leboloc@gmail.com')
        ->setBody($corp);
                    
    $this->get('mailer')->send($message);

    return $this->render('SiteInternetBundle::contact.html.twig');
}
}
    
    
    /**
     * @Route("/patisserie",name="resto")
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
