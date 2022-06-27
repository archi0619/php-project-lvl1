<?php

namespace Src\Games\Calc;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;

function brainCalc()
{
    $name = greeting();
    line("What is the result of the expression?");
    for ($i = 0; $i < 3; $i++) {
        $num1 = rand($min = 1, $max = 30);
        $num2 = rand($min = 1, $max = 15);
        $operands = ['+', '-', '*'];
        $operandsForGame = $operands[mt_rand(0, 2)];
        $question = "{$num1} {$operandsForGame} {$num2}";
        line("Question: {$question}?");
        $answer = prompt("Your answer ");
        $correctAnswer = calcForGame($num1, $num2, $operandsForGame);
        if ($answer == $correctAnswer) {
            line("Correct!");
        } elseif ($answer !== $correctAnswer) {
            return line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
        }
    }
    line("Congratulations, $name!");
}

function calcForGame($num1, $num2, $operation)
{
    switch ($operation) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
    }
}