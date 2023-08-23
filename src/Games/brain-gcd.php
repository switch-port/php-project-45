<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getRandomNumber;

use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

function startGameBrainGcd(): void
{
    $themeOfGame = 'Find the greatest common divisor of given numbers.';
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}

function getQuestionsAnswers(): array
{
    $answersArray = [];
    $randomStartNumbers = [];
    $randomDifferenceNumbers = [];

    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomStartNumbers[] = getRandomNumber();
        $randomDifferenceNumbers[] = getRandomNumber();
        $correctAnswer = findGcd($randomStartNumbers[$i], $randomDifferenceNumbers[$i]);

        $answersArray[] = [
            "Question" => "Question: $randomStartNumbers[$i] $randomDifferenceNumbers[$i]",
            "Correct answer" => $correctAnswer
        ];
    }

    return $answersArray;
}

function findGcd(int $numberOne, int $numberTwo): int
{
    if ($numberOne == 0) {
        return $numberTwo;
    }

    while ($numberTwo != 0) {
        if ($numberOne > $numberTwo) {
            $numberOne -= $numberTwo;
        } else {
            $numberTwo -= $numberOne;
        }
    }

    return $numberOne;
}
