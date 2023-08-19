<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\startGame;

function startGameBrainPrime(): void
{
    startGame("brain-prime", 'Answer "yes" if given number is prime. Otherwise answer "no".');
}
