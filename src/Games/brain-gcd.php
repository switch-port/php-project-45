<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Cli\printLine;
use function BrainGames\Engine\getRandomNumber;
use function BrainGames\Engine\startGame;

function startGameBrainGcd(): void
{
    startGame("brain-gcd", 'Find the greatest common divisor of given numbers.');
}

function getCorrectAnswerBrainGcd(): string
{
    $randomStartNumber = getRandomNumber();
    $randomDifferenceNumber = getRandomNumber();
    printLine("Question: $randomStartNumber $randomDifferenceNumber");

    return findGcd($randomStartNumber, $randomDifferenceNumber);
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
