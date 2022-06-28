<?php

namespace Src\Games\Even;

use function cli\line;
use function cli\prompt;

function brainEven(string $name): void
{
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $i = 0;
    do {
        $num = rand($min = 1, $max = 99);
        line("Question: %s", $num);
        $answer = prompt('Your answer ');
        $num % 2 === 0 ? $correctAnswer = 'yes' : $correctAnswer = 'no';
        if ($answer === $correctAnswer) {
            line('Correct!');
            $i++;
        } else {
            print_r("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.\n");
            line("Let's try again, %s!", $name);
            break;
        }
    } while ($i < 3);

    if ($i === 3) {
        line("Congratulations, %s!", $name);
    }
}
