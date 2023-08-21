<?php

namespace BrainGames\Games\Even;

use function BrainGames\Cli\printLine;
use function BrainGames\Engine\startGame;
use function BrainGames\Engine\getRandomNumber;

function startGameBrainEven(): void
{
    startGame("brain-even", 'Answer "yes" if the number is even, otherwise answer "no".');
}

function getCorrectAnswerBrainEven(): string
{
    $randomNumber = getRandomNumber();
    printLine("Question: $randomNumber");

    if (isEven($randomNumber)) {
        return "yes";
    } else {
        return "no";
    }
}

function isEven(int $number): bool
{
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
    }
}
