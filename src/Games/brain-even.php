<?php

namespace BrainGames\Games\Even;

use BrainGames\Engine\Engine;

function startGameBrainEven(): void
{
    $countCorrectAnswers = 0;
    $winCode = true;

    $engine = new Engine('Answer "yes" if the number is even, otherwise answer "no".');

    while ($countCorrectAnswers < 3) {
        try {
            $randomNumber = random_int(Engine::MIN_INT, Engine::MAX_INT);
        } catch (\Exception $e) {
        }

        $engine->printQuestion((string)$randomNumber);

        if (isEven($randomNumber)) {
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

function isEven(int $number): bool
{
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
    }
}
