<?php

namespace Src\Games\Calc;

use function Src\Engine\play;

const DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ["+", "-", "*"];

function calculate(string $operators, int $firstNum, int $secondNum): string
{
    switch ($operators) {
        case "+":
            return (string) ($firstNum + $secondNum);
        case "-":
            return (string) ($firstNum - $secondNum);
        case "*":
            return (string) ($firstNum * $secondNum);
        default:
            return '';
    }
}

function brainCalc(): void
{
    $getGame = function () {
        $firstNum = rand(1, 50);
        $secondNum = rand(1, 25);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "{$firstNum} {$operator} {$secondNum}";
        $correctAnswer = calculate($operator, $firstNum, $secondNum);
        return [$question, $correctAnswer];
    };
    play($getGame, DESCRIPTION);
}
