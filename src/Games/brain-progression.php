<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getRandomNumber;

use const BrainGames\Engine\NUMBER_OF_GAME_ROUNDS;

function startGameBrainProgression(): void
{
    $themeOfGame = 'What number is missing in the progression?';
    $questionsAnswers = getQuestionsAnswers();
    startGame($themeOfGame, $questionsAnswers);
}

function getQuestionsAnswers(): array
{
    $answersArray = [];
    for ($i = 0; $i < NUMBER_OF_GAME_ROUNDS; $i++) {
        $randomNumbersOne[] = getRandomNumber();
        $randomNumbersTwo[] = getRandomNumber();
        $arithmeticProgression = getArithmeticProgression($randomNumbersOne[$i], $randomNumbersTwo[$i]);
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
