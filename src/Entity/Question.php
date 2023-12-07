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
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $question = null;

    #[ORM\Column(length: 255)]
    private ?string $prejudice = null;

    #[ORM\Column(length: 255)]
    private ?string $fact = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $nbPrejudice = 0;

    #[ORM\Column]
    private ?int $nbFact = 0;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getQuestion(): ?string
    {
        return $this->question;
    }

    public function setQuestion(string $question): static
    {
        $this->question = $question;

        return $this;
    }

    public function getPrejudice(): ?string
    {
        return $this->prejudice;
    }

    public function setPrejudice(string $prejudice): static
    {
        $this->prejudice = $prejudice;

        return $this;
    }

    public function getFact(): ?string
    {
        return $this->fact;
    }

    public function setFact(string $fact): static
    {
        $this->fact = $fact;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getNbPrejudice(): ?int
    {
        return $this->nbPrejudice;
    }

    public function setNbPrejudice(int $nbPrejudice): static
    {
        $this->nbPrejudice = $nbPrejudice;

        return $this;
    }

    public function getNbFact(): ?string
    {
        return $this->nbFact;
    }

    public function setNbFact(string $nbFact): static
    {
        $this->nbFact = $nbFact;

        return $this;
    }
}
