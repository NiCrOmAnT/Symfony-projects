<?php  
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
      /**
      *@Route("/me")
      */
    public function renderAboutMe()
    {
        return $this->render('about_me/about_me.html.twig'); 
    }
}