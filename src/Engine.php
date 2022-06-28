<?php

namespace Src\Engine;

use Src\Games\Even;
use Src\Games\Calc;
use Src\Games\Gcd;
use Src\Games\Progression;
use Src\Games\Prime;

use function cli\line;
use function cli\prompt;

function play(string $game): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    switch ($game) {
        case 'brain-even':
            Even\brainEven($name);
            break;
        case 'brain-calc':
            Calc\brainCalc($name);
            break;
        case 'brain-gcd':
            GCD\brainGCD($name);
            break;
        case 'brain-progression':
            Progression\brainProgression($name);
            break;
        case 'brain-prime':
            Prime\brainPrime($name);
    }
}
