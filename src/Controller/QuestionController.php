<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
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
    public function sendQuestionsData(QuestionRepository $questionRepository) : JsonResponse
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

    #[Route('/incrementTrue/{id}', name: 'incrementTrue')]
    public function updateNbClickTrue(EntityManagerInterface $interface, QuestionRepository $questionRepository, int $id) : JsonResponse {
        $question = $questionRepository->find($id);
        $question->setNbClickTrue(($question->getNbClickTrue() + 1));
        $interface->persist($question);
        $interface->flush();
        return $this->json(null);
    }

    #[Route('/incrementFalse/{id}', name: 'incrementFalse')]
    public function updateNbClickFalse(EntityManagerInterface $interface, QuestionRepository $questionRepository, int $id) : JsonResponse {
        $question = $questionRepository->find($id);
        $question->setNbClickFalse(($question->getNbClickFalse() + 1));
        $interface->persist($question);
        $interface->flush();
        return $this->json(null);
    }
}