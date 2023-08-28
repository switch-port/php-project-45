<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MAX_NUMBER;
use const BrainGames\Engine\MIN_NUMBER;
use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

const THEME_OF_GAME = 'Answer "yes" if the number is even, otherwise answer "no".';

function startGameBrainEven(): void
{
    $themeOfGame = THEME_OF_GAME;
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}

function getQuestionsAnswers(): array
{
    $answersArray = [];

    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomNumber = rand(MIN_NUMBER, MAX_NUMBER);

        $answersArray[] = [
            "Question" => "Question: $randomNumber",
            "Correct answer" => isEven($randomNumber) ? "yes" : "no"
        ];
    }

    return $answersArray;
}

function isEven(int $number): bool
{
    return $number % 2 == 0;
}
