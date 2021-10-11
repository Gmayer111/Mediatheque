<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    /**
     * @return Response
     * @Route ("/", name="home")
     */
    public function homePage(): Response
    {
        return $this->render("Home/home.html.twig");
    }

}