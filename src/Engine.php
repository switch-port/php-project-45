<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\getPrompt;
use function BrainGames\Cli\printLine;

class Engine
{
    private string $userName;
    private string $userAnswer;

    public const MIN_INT = 1;
    public const MAX_INT = 99;

    public function __construct(string $themeOfGame)
    {
        printLine("Welcome to the Brain Games!");
        $this->setUsername();
        printLine("Hello, {$this->userName}!");
        printLine($themeOfGame);
    }

    public function setUserName(): void
    {
        $this->userName = getPrompt("May I have your name? ");
    }

    public function setUserAnswer(): void
    {
        $this->userAnswer = getPrompt("Your answer: ");
    }

    public function printQuestion(string $question): void
    {
        printLine("Question: {$question}");
    }
    public function printCorrect(): void
    {
        printLine("Correct!");
    }

    public function winGame(): void
    {
        printLine("Congratulations, {$this->userName}!");
    }

    public function gameOver(string $correctAnswer): void
    {
        printLine("'{$this->userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
        printLine("Let's try again, {$this->userName}!");
    }

    // ---------------------------GET METHODS----------------------------------
    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getUserAnswer(): string
    {
        return $this->userAnswer;
    }
    // ---------------------------GET METHODS----------------------------------
}
