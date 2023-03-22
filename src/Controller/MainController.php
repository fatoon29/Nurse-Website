<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('main/homepage.html.twig');
    }

    #[Route('/cabinet', name: 'clinic')]
    public function clinic(): Response
    {
        return $this->render('main/clinic.html.twig');
    }

    #[Route('/covid', name: 'covid')]
    public function covid(): Response
    {
        return $this->render('main/covid.html.twig');
    }
}
