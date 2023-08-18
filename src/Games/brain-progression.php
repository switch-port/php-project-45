<?php

namespace BrainGames\Games\Progression;

use BrainGames\Engine\Engine;

function startGameBrainProgression(): void
{
    $countCorrectAnswers = 0;
    $winCode = true;

    $engine = new Engine('What number is missing in the progression?');

    while ($countCorrectAnswers < 3) {
        try {
            $randomStartNumber = random_int(Engine::MIN_INT, 10);
            $randomNumberDifferenceNumber = random_int(Engine::MIN_INT, 4);
        } catch (\Exception $e) {
        }

        $arithmeticProgression = setArithmeticProgression($randomStartNumber, $randomNumberDifferenceNumber);
        $randomElementOfAP = array_rand($arithmeticProgression);
        $correctAnswer = $arithmeticProgression[$randomElementOfAP];
        $arithmeticProgression[$randomElementOfAP] = "..";

        $engine->printQuestion(implode(" ", $arithmeticProgression));

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

function setArithmeticProgression(int $startNumber, int $progressionDifference): array
{
    $arithmeticProgression = [$startNumber];
    for ($i = 1; $i < 10; $i++) {
        $arithmeticProgression[] = $arithmeticProgression[$i - 1] + $progressionDifference;
    }

    return $arithmeticProgression;
}
