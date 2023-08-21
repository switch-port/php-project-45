<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\getPrompt;
use function BrainGames\Cli\printLine;
use function BrainGames\Games\Calc\getCorrectAnswerBrainCalc;
use function BrainGames\Games\Even\getCorrectAnswerBrainEven;
use function BrainGames\Games\Gcd\getCorrectAnswerBrainGcd;
use function BrainGames\Games\Prime\getCorrectAnswerBrainPrime;
use function BrainGames\Games\Progression\getCorrectAnswerBrainProgression;

const MIN_NUMBER = 1;
const MAX_NUMBER = 99;

function startGame(string $nameOfGame, string $themeOfGame): void
{
    $countCorrectAnswers = 0;
    $winCode = true;

    printLine("Welcome to the Brain Games!");
    $userName = getPrompt("May I have your name? ");
    printLine("Hello, $userName!");
    printLine($themeOfGame);

    while ($countCorrectAnswers < 3) {
        $correctAnswer = getCorrectAnswer($nameOfGame);

        $userAnswer = getPrompt("Your answer: ");

        if ($userAnswer == $correctAnswer) {
            printLine("Correct!");
            $countCorrectAnswers++;
        } else {
            printLine("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            $winCode = false;
            break;
        }
    }

    printEndGameMessage($userName, $winCode);
}

function getCorrectAnswer(string $nameOfGame): string
{
    return match ($nameOfGame) {
        "brain-even" => getCorrectAnswerBrainEven(),
        "brain-calc" => getCorrectAnswerBrainCalc(),
        "brain-gcd" => getCorrectAnswerBrainGcd(),
        "brain-progression" => getCorrectAnswerBrainProgression(),
        "brain-prime" => getCorrectAnswerBrainPrime(),
        default => ""
    };
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
