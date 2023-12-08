<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    #[Route('/questions', name: 'questionList')]
    public function questionList(): Response
    {
        return $this->render('NDI/ndi.html.twig');
    }

    #[Route('/getQuestionContent', name: 'getQuestionContent')]
    public function sendQuestionsData(QuestionRepository $questionRepository): JsonResponse
    {
        $allQuestions = $questionRepository->findAll();
        $randomIndices = array_rand($allQuestions, 10);
        $randomQuestions = [];
        foreach ($randomIndices as $index) {
            $randomQuestions[] = $allQuestions[$index];
        }
        $data = array(
            'array' => $randomQuestions
        );

        return $this->json($data);
    }
}
