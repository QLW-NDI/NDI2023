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
    private ?string $answer_false = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $answer_true = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $explication = null;

    #[ORM\Column]
    private ?int $nb_click_true = 0;

    #[ORM\Column]
    private ?int $nb_click_false = 0;

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
        return $this->answer_false;
    }

    /**
     * @param string|null $answer_false
     */
    public function setAnswerFalse(?string $answer_false): void
    {
        $this->answer_false = $answer_false;
    }

    /**
     * @return string|null
     */
    public function getAnswerTrue(): ?string
    {
        return $this->answer_true;
    }

    /**
     * @param string|null $answer_true
     */
    public function setAnswerTrue(?string $answer_true): void
    {
        $this->answer_true = $answer_true;
    }

    /**
     * @return string|null
     */
    public function getExplication(): ?string
    {
        return $this->explication;
    }

    /**
     * @param string|null $explication
     */
    public function setExplication(?string $explication): void
    {
        $this->explication = $explication;
    }

    /**
     * @return int|null
     */
    public function getNbClickTrue(): ?int
    {
        return $this->nb_click_true;
    }

    /**
     * @param int|null $nb_click_true
     */
    public function setNbClickTrue(?int $nb_click_true): void
    {
        $this->nb_click_true = $nb_click_true;
    }

    /**
     * @return int|null
     */
    public function getNbClickFalse(): ?int
    {
        return $this->nb_click_false;
    }

    /**
     * @param int|null $nb_click_false
     */
    public function setNbClickFalse(?int $nb_click_false): void
    {
        $this->nb_click_false = $nb_click_false;
    }


}
