<?php

namespace Src\Games\Prime;

use function cli\line;
use function cli\prompt;

function brainPrime(string $name): void
{
    line('Answer "yes" if the number is prime. Otherwise answer "no".');
    $i = 0;
    do {
        $num = rand($min = 2, $max = 200);
        $correctAnswer = 'yes';
        for ($check = $num - 1; $check > 1; $check--) {
            if ($num % $check == 0) {
                $correctAnswer = 'no';
            }
        }
        line("Question: %s", $num);
        $answer = prompt('Your answer ');
        if ($answer === $correctAnswer) {
            line('Correct!');
            $i++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.\nLet's try again, %s!", $name);
            break;
        }
    } while ($i < 3);

    if ($i == 3) {
        line("Congratulations, %s!", $name);
    }
}
