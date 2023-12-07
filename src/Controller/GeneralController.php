<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GeneralController extends AbstractController
{
    #[Route('/NDI', name: 'NDI')]
    public function index(): Response
    {
        return $this->render('NDI/ndi.html.twig');
    }

    #[Route('/dino',name:'dino')]
    public function dino(): Response
    {
        return $this->render('NDI/dino.html.twig');
    }
}
