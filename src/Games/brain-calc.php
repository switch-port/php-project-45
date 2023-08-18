<?php

namespace BrainGames\Games\Calc;
require_once __DIR__ . '/../../vendor/autoload.php';

use BrainGames\Engine\Engine;

function startGameBrainCalc(): void
{
    $countCorrectAnswers = 0;
    $winCode = true;
    $arrayOfSigns = ["+","-","*"];

    $engine = new Engine('What is the result of the expression?');

    while ($countCorrectAnswers < 3) {
        try {
            $randomNumberOne = random_int(Engine::MIN_INT, Engine::MAX_INT);
            $randomNumberTwo = random_int(Engine::MIN_INT, Engine::MAX_INT);
        } catch (\Exception $e) {
        }

        $randomSign = array_rand($arrayOfSigns);

        $engine->printQuestion("{$randomNumberOne} {$arrayOfSigns[$randomSign]} {$randomNumberTwo}");

        $correctAnswer = mathResult($randomNumberOne, $arrayOfSigns[$randomSign], $randomNumberTwo);

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

function mathResult(int $numOne, string $sign, int $numTwo): int
{
    return match ($sign) {
        "+" => $numOne + $numTwo,
        "-" => $numOne - $numTwo,
        "*" => $numOne * $numTwo,
    };
}