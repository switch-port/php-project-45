<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

use const BrainGames\Engine\MAX_NUMBER;
use const BrainGames\Engine\MIN_NUMBER;
use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

const THEME_OF_GAME = 'What number is missing in the progression?';

function startGameBrainProgression(): void
{
    $themeOfGame = THEME_OF_GAME;
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}

function getQuestionsAnswers(): array
{
    $answersArray = [];

    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomNumberOne = rand(MIN_NUMBER, MAX_NUMBER);
        $randomNumberTwo = rand(MIN_NUMBER, MAX_NUMBER);
        $arithmeticProgression = getArithmeticProgression($randomNumberOne, $randomNumberTwo);
        $randomElementOfAP = array_rand($arithmeticProgression);
        $correctAnswer = $arithmeticProgression[$randomElementOfAP];
        $arithmeticProgression[$randomElementOfAP] = "..";

        $answersArray[] = [
            "Question" => "Question: " . implode(" ", $arithmeticProgression),
            "Correct answer" => $correctAnswer
        ];
    }

    return $answersArray;
}

function getArithmeticProgression(int $startNumber, int $progressionDifference): array
{
    $arithmeticProgression = [$startNumber];
    for ($i = 1; $i < 10; $i++) {
        $arithmeticProgression[] = $arithmeticProgression[$i - 1] + $progressionDifference;
    }

    return $arithmeticProgression;
}
