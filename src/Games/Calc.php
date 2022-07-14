<?php

namespace Src\Games\Calc;

use function Src\Engine\play;

const DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ["+", "-", "*"];

function calculate(string $operator, int $firstNum, int $secondNum): string
{
    switch ($operator) {
        case "+":
            return $firstNum + $secondNum;
        case "-":
            return $firstNum - $secondNum;
        case "*":
            return $firstNum * $secondNum;
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
