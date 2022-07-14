<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

const WINS = 3;

function play(callable $game, string $description): void
{
    line("Welcome to the Brain Game!");
    $name = prompt("May I have your name?");
    line("Hello, %s!", $name);
    line("$description");

    for ($i = 0; $i < WINS; $i++) {
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
