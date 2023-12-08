<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WikiController extends AbstractController
{
    #[Route('/wiki', name: 'wiki')]
    public function index(): Response
    {
        return $this->render('wiki/wiki.html.twig');
    }
}
