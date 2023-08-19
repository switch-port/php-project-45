<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function printLine(string $str): void
{
    line($str);
}

function getPrompt(string $str): string
{
    return prompt($str, "", "");
}
