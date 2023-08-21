<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Cli\printLine;
use function BrainGames\Engine\getRandomNumber;
use function BrainGames\Engine\startGame;

function startGameBrainProgression(): void
{
    startGame("brain-progression", 'What number is missing in the progression?');
}

function getCorrectAnswerBrainProgression(): string
{
    $randomNumberOne = getRandomNumber();
    $randomNumberTwo = getRandomNumber();
    $arithmeticProgression = setArithmeticProgression($randomNumberOne, $randomNumberTwo);
    $randomElementOfAP = array_rand($arithmeticProgression);
    $correctAnswer = $arithmeticProgression[$randomElementOfAP];
    $arithmeticProgression[$randomElementOfAP] = "..";

    printLine("Question: " . implode(" ", $arithmeticProgression));

    return $correctAnswer;
}

function setArithmeticProgression(int $startNumber, int $progressionDifference): array
{
    $arithmeticProgression = [$startNumber];
    for ($i = 1; $i < 10; $i++) {
        $arithmeticProgression[] = $arithmeticProgression[$i - 1] + $progressionDifference;
    }

    return $arithmeticProgression;
}
