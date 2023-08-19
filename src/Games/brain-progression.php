<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\startGame;

function startGameBrainProgression(): void
{
    startGame("brain-progression", 'What number is missing in the progression?');
}
