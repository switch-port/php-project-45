<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Cli\printLine;
use function BrainGames\Engine\getRandomNumber;
use function BrainGames\Engine\startGame;

function startGameBrainPrime(): void
{
    startGame("brain-prime", 'Answer "yes" if given number is prime. Otherwise answer "no".');
}

function getCorrectAnswerBrainPrime(): string
{
    $randomNumber = getRandomNumber();
    printLine("Question: $randomNumber");

    if (isPrimeNumber($randomNumber)) {
        return "yes";
    } else {
        return "no";
    }
}

function isPrimeNumber(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i < $number / 2; $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}
