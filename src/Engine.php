<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\getPrompt;
use function BrainGames\Cli\printLine;

const MIN_INT = 1;
const MAX_INT = 99;
$userName = "";

function startGame(string $nameOfGame, string $themeOfGame): void
{
    $countCorrectAnswers = 0;

    printLine("Welcome to the Brain Games!");
    $userName = getPrompt("May I have your name? ");
    printLine("Hello, $userName!");
    printLine($themeOfGame);

    while ($countCorrectAnswers < 3) {
        $correctAnswer = getCorrectAnswer($nameOfGame);

        $userAnswer = getPrompt("Your answer: ");

        if ($userAnswer == $correctAnswer) {
            printLine("Correct!");
            $countCorrectAnswers++;
        } else {
            printLine("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            printLine("Let's try again, $userName!");
            break;
        }
    }

    congratulation($userName, true);
}

function getCorrectAnswer(string $nameOfGame): string
{
    return match ($nameOfGame) {
        "brain-even" => brainEven(),
        "brain-calc" => brainCalc(),
        "brain-gcd" => brainGcd(),
        "brain-progression" => brainProgression(),
        "brain-prime" => brainPrime(),
        default => ""
    };
}

function brainEven(): string
{
    $randomNumber = getRandomNumber();
    printLine("Question: $randomNumber");

    if (isEven($randomNumber)) {
        return "yes";
    } else {
        return "no";
    }
}

function brainCalc(): string
{
    $randomNumberOne = getRandomNumber();
    $randomNumberTwo = getRandomNumber();
    $arrayOfSigns = ["+","-","*"];
    $randomSign = array_rand($arrayOfSigns);

    printLine("Question: $randomNumberOne $arrayOfSigns[$randomSign] $randomNumberTwo");

    return mathResult($randomNumberOne, $arrayOfSigns[$randomSign], $randomNumberTwo);
}

function brainGcd(): string
{
    $randomStartNumber = getRandomNumber();
    $randomDifferenceNumber = getRandomNumber();
    printLine("Question: $randomStartNumber $randomDifferenceNumber");

    return findGcd($randomStartNumber, $randomDifferenceNumber);
}

function brainProgression(): string
{
    $randomNumberOne = getRandomNumber();
    $randomNumberTwo = getRandomNumber();
    $arithmeticProgression = setArithmeticProgression($randomNumberOne, $randomNumberTwo);
    $randomElementOfAP = array_rand($arithmeticProgression);
    $correctAnswer = $arithmeticProgression[$randomElementOfAP];
    $arithmeticProgression[$randomElementOfAP] = "..";

    printLine("Question: " . implode(" ", $arithmeticProgression));

    return $correctAnswer;
}

function brainPrime(): string
{
    $randomNumber = getRandomNumber();
    printLine("Question: $randomNumber");

    if (isPrimeNumber($randomNumber)) {
        return "yes";
    } else {
        return "no";
    }
}

function getRandomNumber(): int
{
    return rand(MIN_INT, MAX_INT);
}

function mathResult(int $numOne, string $sign, int $numTwo): string
{
    return match ($sign) {
        "+" => $numOne + $numTwo,
        "-" => $numOne - $numTwo,
        "*" => $numOne * $numTwo,
        default => ""
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

function congratulation(string $userName, bool $winCode): void
{
    if ($winCode) {
        printLine("Congratulations, $userName!");
    }
}