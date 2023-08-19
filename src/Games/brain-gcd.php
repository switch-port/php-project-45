<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\startGame;

function startGameBrainGcd(): void
{
    startGame("brain-gcd", 'Find the greatest common divisor of given numbers.');
}
