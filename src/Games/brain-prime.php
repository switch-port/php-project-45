<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getRandomNumber;

use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

function startGameBrainPrime(): void
{
    $themeOfGame = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}


function getQuestionsAnswers(): array
{
    $answersArray = [];
    $randomPrimeNumbers = [];

    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomPrimeNumbers[] = getRandomNumber();
        $correctAnswer = isPrimeNumber($randomPrimeNumbers[$i]) ? "yes" : "no";

        $answersArray[] = [
            "Question" => "Question: $randomPrimeNumbers[$i]",
            "Correct answer" => $correctAnswer
        ];
    }

    return $answersArray;
}

function isPrimeNumber(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
