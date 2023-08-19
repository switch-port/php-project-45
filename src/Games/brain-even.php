<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\startGame;

function startGameBrainEven(): void
{
    startGame("brain-even", 'Answer "yes" if the number is even, otherwise answer "no".');
}
