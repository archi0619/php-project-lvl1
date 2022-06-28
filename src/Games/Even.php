<?php

namespace Src\Games\Even;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;

function isEven(): mixed
{
    $name = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $num = rand($min = 1, $max = 30);
        $correctAnswer = $num % 2 === 0 ? 'yes' : 'no';
        line("Question: $num");
        $answer = prompt("Your answer: ");
        if ($answer === $correctAnswer) {
            line('Correct!');
        } else {
            return line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
        }
    };
    line("Congratulations, $name!");
}
