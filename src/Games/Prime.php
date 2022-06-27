<?php

namespace Src\Games\Prime;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;

function primeCheck(int $num): bool
{
    for ($i = 2; $i < $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function brainPrime()
{
    $name = greeting();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < 3; $i++) {
        $num = rand($min = 2, $max = 50);
        line("Question: $num");
        $answer = prompt("Your answer ");
        $correctAnswer = primeCheck($num) ? 'yes' : 'no';
        if ($answer == $correctAnswer) {
            line('Correct!');
        } else {
            return line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
        }
    };
    line("Congratulations, $name!");
}
