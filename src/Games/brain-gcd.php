<?php

namespace BrainGames\Games\Gcd;

use BrainGames\Engine\Engine;

function startGameBrainGcd(): void
{
    $countCorrectAnswers = 0;
    $winCode = true;

    $engine = new Engine('Find the greatest common divisor of given numbers.');

    while ($countCorrectAnswers < 3) {
        try {
            $randomNumberOne = random_int(Engine::MIN_INT, Engine::MAX_INT);
            $randomNumberTwo = random_int(Engine::MIN_INT, Engine::MAX_INT);
        } catch (\Exception $e) {
        }


        $engine->printQuestion("{$randomNumberOne} {$randomNumberTwo}");

        $correctAnswer = gmp_strval(gmp_gcd($randomNumberOne, $randomNumberTwo));

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
