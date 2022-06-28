<?php

namespace Src\Games\Calc;

use function cli\line;
use function cli\prompt;

function brainCalc(string $name): void
{
    $operation = ['+', '-', '*'];
    line("What is the result of the expression?");
    $i = 0;
    do {
        $num1 = rand(1, 50);
        $num2 = rand(1, 20);
        $correctAnswer = 0;
        $operand = rand(0, 2);
        $question = "$num1 $operation[$operand] $num2";
        line("Question: %s", $question);
        switch ($operation[$operand]) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
        }
        $answer = prompt('Your answer');
        if ($answer == intval($correctAnswer)) {
            line('Correct!');
            $i++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.\nLet's try again, %s!", $name);
            break;
        }
    } while ($i < 3);

    if ($i === 3) {
        line("Congratulations, %s!", $name);
    }
}
