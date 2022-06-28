<?php

namespace Src\Games\Gcd;

use function cli\line;
use function cli\prompt;

function brainGCD(string $name): void
{
    line("Find the greatest common divisor of given numbers.");
    $i = 0;
    do {
        $num1 = rand($min = 2, $max = 50);
        $num2 = rand($min = 2, $max = 50);
        $question = "$num1 $num2";
        line("Question: %s", $question);
        $num1 > $num2 ? $least = $num2 : $least = $num1;
        $gcd = 1;
        for ($numberCheck = $least; $numberCheck > 1; $numberCheck--) {
            $modul1 = $num1 % $numberCheck;
            $modul2 = $num2 % $numberCheck;
            if ($modul1 === 0 && $modul2 === 0) {
                $gcd = $numberCheck;
                break;
            }
        }
        $answer = prompt('Your answer');
        if ($answer == $gcd) {
            line('Correct!');
            $i++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$gcd}'. \nLet's try again, %s!", $name);
            break;
        }
    } while ($i < 3);

    if ($i == 3) {
        line("Congratulations, %s!", $name);
    }
}
