<?php

namespace Src\Games\Gcd;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;

function brainGCD()
{
    $name = greeting();
    line('Find the greatest common divisor of given numbers.');
    for ($i = 0; $i < 3; $i++) {
        $num1 = rand($min = 1, $max = 50);
        $num2 = rand($min = 1, $max = 50);
        $question = "{$num1} {$num2}";
        line("Question: {$question}");
        $answer = prompt("Your answer");
        $correctAnswer = gcd($num1, $num2);
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            return line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
        }
    }
    line("Congratulations, $name!");
}

function gcd($a, $b): bool
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
