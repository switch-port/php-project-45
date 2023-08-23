<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getRandomNumber;

use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

function startGameBrainCalc(): void
{
    $themeOfGame = 'What is the result of the expression?';
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}
function getQuestionsAnswers(): array
{
    $answersArray = [];
    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomNumbersOne[] = getRandomNumber();
        $randomNumbersTwo[] = getRandomNumber();
        $arrayOfSigns = ["+", "-", "*"];
        $randomSign = array_rand($arrayOfSigns);
        $correctAnswer = getMathResult($randomNumbersOne[$i], $arrayOfSigns[$randomSign], $randomNumbersTwo[$i]);

        $answersArray[] = [
            "Question" => "Question: $randomNumbersOne[$i] $arrayOfSigns[$randomSign] $randomNumbersTwo[$i]",
            "Correct answer" => $correctAnswer
        ];
    }

    return $answersArray;
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
