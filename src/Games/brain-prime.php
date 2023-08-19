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
