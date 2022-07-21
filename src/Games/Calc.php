<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\play;

const DESCRIPTION = "What is the result of the expression?";
const OPERATORS = ["+", "-", "*"];

function calculate(string $operators, int $firstNum, int $secondNum): int
{
    switch ($operators) {
        case "+":
            return ($firstNum + $secondNum);
        case "-":
            return ($firstNum - $secondNum);
        case "*":
            return ($firstNum * $secondNum);
        default:
            throw new \Exception('Incorrect operand!');
    }
}

function playGame(): void
{
    $getGame = function () {
        $firstNum = rand(1, 50);
        $secondNum = rand(1, 25);
        $operator = OPERATORS[array_rand(OPERATORS)];
        $question = "{$firstNum} {$operator} {$secondNum}";
        $correctAnswer = (string) calculate($operator, $firstNum, $secondNum);
        return [$question, $correctAnswer];
    };
    play($getGame, DESCRIPTION);
}
