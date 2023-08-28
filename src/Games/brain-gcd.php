<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MAX_NUMBER;
use const BrainGames\Engine\MIN_NUMBER;
use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

const THEME_OF_GAME = 'Find the greatest common divisor of given numbers.';

function startGameBrainGcd(): void
{
    $themeOfGame = THEME_OF_GAME;
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}

function getQuestionsAnswers(): array
{
    $answersArray = [];

    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomStartNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $randomDifferenceNumber = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = findGcd($randomStartNumber, $randomDifferenceNumber);

        $answersArray[] = [
            "Question" => "Question: $randomStartNumber $randomDifferenceNumber",
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
