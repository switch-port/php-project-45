<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MAX_NUMBER;
use const BrainGames\Engine\MIN_NUMBER;
use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

const THEME_OF_GAME = 'What is the result of the expression?';

function startGameBrainCalc(): void
{
    $themeOfGame = THEME_OF_GAME;
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}

function getQuestionsAnswers(): array
{
    $answersArray = [];
    $arrayOfSigns = ["+", "-", "*"];

    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomNumberOne = rand(MIN_NUMBER, MAX_NUMBER);
        $randomNumberTwo = rand(MIN_NUMBER, MAX_NUMBER);
        $randomSign = array_rand($arrayOfSigns);
        $correctAnswer = getMathResult($randomNumberOne, $arrayOfSigns[$randomSign], $randomNumberTwo);

        $answersArray[] = [
            "Question" => "Question: $randomNumberOne $arrayOfSigns[$randomSign] $randomNumberTwo",
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
