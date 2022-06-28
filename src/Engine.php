<?php

namespace Src\Engine;

use BrainGames\Games\{Calc, Even, Gcd, Prime, Progression};

use function cli\line;
use function cli\prompt;

function playGame(string $game, string $desc, callable $generateTask): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('%s', $desc);

    for ($wins = 0; $wins < 3; $wins++) {
        $task = $generateTask();
        line("Question: %s", $task['question']);
        $userAnswer = prompt('Your answer');

        if (strtolower($task['answer']) === strtolower($userAnswer)) {
            line("Correct!");
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $task['answer']);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
