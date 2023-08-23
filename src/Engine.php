<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\getPrompt;
use function BrainGames\Cli\printLine;

const MIN_NUMBER = 1;
const MAX_NUMBER = 99;
const NUMBER_OF_GAME_ROUNDS = 3;

function startGame(string $themeOfGame, array $questionsAnswers): void
{
    $winCode = true;

    printLine("Welcome to the Brain Games!");
    $userName = getPrompt("May I have your name? ");
    printLine("Hello, $userName!");
    printLine($themeOfGame);

    foreach ($questionsAnswers as ["Question" => $question, "Correct answer" => $correctAnswer]) {
        printLine($question);
        $userAnswer = getPrompt("Your answer: ");

        if ($userAnswer == $correctAnswer) {
            printLine("Correct!");
        } else {
            printLine("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            $winCode = false;
            break;
        }
    }

    printEndGameMessage($userName, $winCode);
}

function getRandomNumber(): int
{
    return rand(MIN_NUMBER, MAX_NUMBER);
}

function printEndGameMessage(string $userName, bool $winCode): void
{
    if ($winCode) {
        printLine("Congratulations, $userName!");
    } else {
        printLine("Let's try again, $userName!");
    }
}
