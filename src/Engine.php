<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\getPrompt;
use function BrainGames\Cli\printLine;

const MIN_INT = 1;
const MAX_INT = 99;
const CONGRATULATION_STRING = "Congratulations";

function startGame(string $nameOfGame, string $themeOfGame): void
{
    $countCorrectAnswers = 0;
    $correctAnswer = "";
    $winCode = true;

    printLine("Welcome to the Brain Games!");
    $userName = getPrompt("May I have your name? ");
    printLine("Hello, {$userName}!");
    printLine($themeOfGame);

    while ($countCorrectAnswers < 3) {
        // BRAIN_EVEN GAME
        if ($nameOfGame == "brain-even") {
            try {
                $randomNumber = random_int(MIN_INT, MAX_INT);
            } catch (\Exception $e) {
            }

            printLine("Question: {$randomNumber}");

            if (isEven($randomNumber)) {
                $correctAnswer = "yes";
            } else {
                $correctAnswer = "no";
            }
            // BRAIN_CALC GAME
        } elseif ($nameOfGame == "brain-calc") {
            try {
                $randomNumberOne = random_int(MIN_INT, MAX_INT);
                $randomNumberTwo = random_int(MIN_INT, MAX_INT);
            } catch (\Exception $e) {
            }
            $arrayOfSigns = ["+","-","*"];
            $randomSign = array_rand($arrayOfSigns);

            printLine("Question: {$randomNumberOne} {$arrayOfSigns[$randomSign]} {$randomNumberTwo}");

            $correctAnswer = mathResult($randomNumberOne, $arrayOfSigns[$randomSign], $randomNumberTwo);
            // BRAIN_GCD GAME
        } elseif ($nameOfGame == "brain-gcd") {
            try {
                $randomNumberOne = random_int(MIN_INT, MAX_INT);
                $randomNumberTwo = random_int(MIN_INT, MAX_INT);
            } catch (\Exception $e) {
            }

            printLine("Question: {$randomNumberOne} {$randomNumberTwo}");

            $correctAnswer = findGcd($randomNumberOne, $randomNumberTwo);
            // BRAIN_PROGRESSION GAME
        } elseif ($nameOfGame == "brain-progression") {
            try {
                $randomStartNumber = random_int(MIN_INT, MAX_INT);
                $randomNumberDifferenceNumber = random_int(MIN_INT, MAX_INT);
            } catch (\Exception $e) {
            }

            $arithmeticProgression = setArithmeticProgression($randomStartNumber, $randomNumberDifferenceNumber);
            $randomElementOfAP = array_rand($arithmeticProgression);
            $correctAnswer = $arithmeticProgression[$randomElementOfAP];
            $arithmeticProgression[$randomElementOfAP] = "..";

            printLine("Question: ".implode(" ", $arithmeticProgression));
            // BRAIN_PRIME GAME
        } elseif ($nameOfGame == "brain-prime") {
            try {
                $randomNumber = random_int(MIN_INT, MAX_INT);
            } catch (\Exception $e) {
            }

            printLine("Question: {$randomNumber}");

            if (isPrimeNumber($randomNumber)) {
                $correctAnswer = "yes";
            } else {
                $correctAnswer = "no";
            }
        }

        // получение ответа
        $userAnswer = getPrompt("Your answer: ");

        // определение верности ответа
        if ($userAnswer == $correctAnswer) {
            printLine("Correct!");
            $countCorrectAnswers++;
        } else {
            printLine("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            printLine("Let's try again, {$userName}!");
            $winCode = false;
            break;
        }
    }

    if ($winCode) {
        printLine("Congratulations, {$userName}!");
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

function isEven(int $number): bool
{
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
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

function findGcd(int $numberOne, int $numberTwo): int
{
    return gmp_strval(gmp_gcd($numberOne, $numberTwo));
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

//
//namespace BrainGames\Engine;
//
//use function BrainGames\Cli\getPrompt;
//use function BrainGames\Cli\printLine;
//
//const MIN_INT = 1;
//const MAX_INT = 99;
//const CONGRATULATION_STRING = "Congratulations";
//
//function startGame(string $themeOfGame, array $randomValues): void
//{
//    $countCorrectAnswers = 0;
//    $winCode = true;
//
//    printLine("Welcome to the Brain Games!");
//    $userName = getPrompt("May I have your name? ");
//    printLine("Hello, {$userName}!");
//    printLine($themeOfGame);
//
//    while ($countCorrectAnswers < 3) {
//        $randomNumber = random_int(Engine::MIN_INT, Engine::MAX_INT);
//
//        $question = "";
//
//        printLine("Question: {$question}");
//
//        $userAnswer = getPrompt("Your answer: ");
//
//        $correctAnswer = "";
//
//        if ($userAnswer == $correctAnswer) {
//            printLine("Correct!");
//            $countCorrectAnswers++;
//        } else {
//            printLine("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
//            printLine("Let's try again, {$userName}!");
//            $winCode = false;
//            break;
//        }
//    }
//
//
//    if ($winCode) {
//        printLine("Congratulations, {$userName}!");
//    }
//}
