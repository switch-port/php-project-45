<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Cli\printLine;
use function BrainGames\Engine\getRandomNumber;
use function BrainGames\Engine\startGame;

function startGameBrainCalc(): void
{
    startGame("brain-calc", 'What is the result of the expression?');
}

function getCorrectAnswerBrainCalc(): string
{
    $randomNumberOne = getRandomNumber();
    $randomNumberTwo = getRandomNumber();
    $arrayOfSigns = ["+","-","*"];
    $randomSign = array_rand($arrayOfSigns);

    printLine("Question: $randomNumberOne $arrayOfSigns[$randomSign] $randomNumberTwo");

    return getMathResult($randomNumberOne, $arrayOfSigns[$randomSign], $randomNumberTwo);
}

function getMathResult(int $numOne, string $sign, int $numTwo): string
{
    return match ($sign) {
        "+" => $numOne + $numTwo,
        "-" => $numOne - $numTwo,
        "*" => $numOne * $numTwo,
        default => ""
    };
}
