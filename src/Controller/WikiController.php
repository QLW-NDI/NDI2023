<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WikiController extends AbstractController
{
    #[Route('/wiki', name: 'wiki')]
    public function index(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findAll();

        return $this->render('wiki/wiki.html.twig', ["questions"=>$questions]);
    }

    #[Route('/search', name: 'searchTheme', methods: ["POST"])]
    public function searchTheme(Request $request, QuestionRepository $questionRepository)
    {
        $searchTerm = $request->request->get('searchTerm');
        $questions = $questionRepository->findTheme($searchTerm);
        return $this->render('wiki/wiki.html.twig', ["questions" => $questions]);
    }
}
