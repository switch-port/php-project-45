<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\getPrompt;
use function BrainGames\Cli\printLine;

const MIN_NUMBER = 1;
const MAX_NUMBER = 99;
const NUMBER_OF_GAME_ROUNDS = 3;
const WELCOME = "Welcome to the Brain Games!";
const GET_YOUR_NAME = "May I have your name? ";

function startGame(string $themeOfGame, array $questionsAnswers): void
{
    $winCode = true;

    printLine(WELCOME);
    $userName = getPrompt(GET_YOUR_NAME);
    printLine("Hello, $userName!");
    printLine($themeOfGame);

    foreach ($questionsAnswers as ["Question" => $question, "Correct answer" => $correctAnswer]) {
        printLine($question);
        $userAnswer = getPrompt("Your answer: ");

        if ($userAnswer == $correctAnswer) {
            printLine("Correct!");
        } else {
            printLine("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            printLine("Let's try again, $userName!");
            return;
        }
    }

    printLine("Congratulations, $userName!");
}
