<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getRandomNumber;

use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

function startGameBrainEven(): void
{
    $themeOfGame = 'Answer "yes" if the number is even, otherwise answer "no".';
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}

function getQuestionsAnswers(): array
{
    $answersArray = [];
    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomNumbers[] = getRandomNumber();
        $correctAnswer = isEven($randomNumbers[$i]) ? "yes" : "no";
        $answersArray[] = [
            "Question" => "Question: $randomNumbers[$i]",
            "Correct answer" => $correctAnswer
        ];
    }

    return $answersArray;
}

function isEven(int $number): bool
{
    return $number % 2 == 0;
}
