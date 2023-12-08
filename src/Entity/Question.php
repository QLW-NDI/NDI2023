<?php

namespace App\Entity;

use App\Repository\QuestionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionRepository::class)]
class Question
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $theme = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $question = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $answerFalse = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $answerTrue = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $explanation = null;

    #[ORM\Column(options: ['default' => 0])]
    private ?int $nbClickTrue = 0;

    #[ORM\Column(options: ['default' => 0])]
    private ?int $nbClickFalse = 0;
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getTheme(): ?string
    {
        return $this->theme;
    }

    /**
     * @param string|null $theme
     */
    public function setTheme(?string $theme): void
    {
        $this->theme = $theme;
    }

    /**
     * @return string|null
     */
    public function getQuestion(): ?string
    {
        return $this->question;
    }

    /**
     * @param string|null $question
     */
    public function setQuestion(?string $question): void
    {
        $this->question = $question;
    }

    /**
     * @return string|null
     */
    public function getAnswerFalse(): ?string
    {
        return $this->answerFalse;
    }

    /**
     * @param string|null $answer_false
     */
    public function setAnswerFalse(?string $answer_false): void
    {
        $this->answerFalse = $answer_false;
    }

    /**
     * @return string|null
     */
    public function getAnswerTrue(): ?string
    {
        return $this->answerTrue;
    }

    /**
     * @param string|null $answerTrue
     */
    public function setAnswerTrue(?string $answerTrue): void
    {
        $this->answerTrue = $answerTrue;
    }

    /**
     * @return string|null
     */
    public function getExplanation(): ?string
    {
        return $this->explanation;
    }

    /**
     * @param string|null $explanation
     */
    public function setExplanation(?string $explanation): void
    {
        $this->explanation = $explanation;
    }

    /**
     * @return int|null
     */
    public function getNbClickTrue(): ?int
    {
        return $this->nbClickTrue;
    }

    /**
     * @param int|null $nbClickTrue
     */
    public function setNbClickTrue(?int $nbClickTrue): void
    {
        $this->nbClickTrue = $nbClickTrue;
    }

    /**
     * @return int|null
     */
    public function getNbClickFalse(): ?int
    {
        return $this->nbClickFalse;
    }

    /**
     * @param int|null $nbClickFalse
     */
    public function setNbClickFalse(?int $nbClickFalse): void
    {
        $this->nbClickFalse = $nbClickFalse;
    }

}
