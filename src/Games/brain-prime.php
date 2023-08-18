<?php

namespace BrainGames\Games\Prime;

use BrainGames\Engine\Engine;

function startGameBrainPrime(): void
{
    $countCorrectAnswers = 0;
    $winCode = true;

    $engine = new Engine('"yes" if given number is prime. Otherwise answer "no".');

    while ($countCorrectAnswers < 3) {
        try {
            $randomNumber = random_int(Engine::MIN_INT, Engine::MAX_INT);
        } catch (\Exception $e) {
        }

        $engine->printQuestion($randomNumber);

        if (isPrimeNumber($randomNumber)) {
            $correctAnswer = "yes";
        } else {
            $correctAnswer = "no";
        }

        $engine->setUserAnswer();

        if ($engine->getUserAnswer() == $correctAnswer) {
            $engine->printCorrect();
            $countCorrectAnswers++;
        } else {
            $engine->gameOver($correctAnswer);
            $winCode = false;
            break;
        }
    }

    if ($winCode) {
        $engine->winGame();
    }
}

function isPrimeNumber(int $number): bool
{
    $count = 0;
    for ($i = 1; $i <= $number; $i++) {
        if ($number % $i == 0) {
            $count++;
        }
    }
    if ($count == 2) {
        return true;
    } else {
        return false;
    }
}
