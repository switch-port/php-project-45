<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MAX_NUMBER;
use const BrainGames\Engine\MIN_NUMBER;
use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

const THEME_OF_GAME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function startGameBrainPrime(): void
{
    $themeOfGame = THEME_OF_GAME;
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}

function getQuestionsAnswers(): array
{
    $answersArray = [];

    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomPrime = rand(MIN_NUMBER, MAX_NUMBER);
        $correctAnswer = isPrimeNumber($randomPrime) ? "yes" : "no";

        $answersArray[] = [
            "Question" => "Question: $randomPrime",
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
