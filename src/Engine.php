<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

function play(array $game, string $description): void
{
    line("Welcome to the Brain Game!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line("$description");

    for ($win = 0; $win < 3; $win++) {
        [$question, $correctAnswer] = $game();
        line("Question: %s", $question);
        $answer = prompt("Your answer");
        if ($answer !== $correctAnswer) {
            line("$answer is wrong answer ;(. Correct answer was $correctAnswer.");
            line("Let's try again, %s!", $name);
            exit;
        }
        line("Correct!");
    }
    line("Congratulations, %s!", $name);
}
