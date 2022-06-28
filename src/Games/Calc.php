<?php

namespace Src\Games\Calc;

use function Src\Engine\playGame;

const GAME_NAME = 'Calc';
const GAME_DESCRIPTION = 'What is the result of the expression?';

function calculate(int $num1, int $num2, string $operation): string
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

function play(): void
{
    $generateTask = function (): array {
        $operations = ['+','-','*'];
        $operation = $operations[array_rand($operations)];
        $number1 = rand(1, 50);
        $number2 = rand(1, 25);

        return [
            'question' => "{$number1} {$operation} {$number2}",
            'answer' => calculate($number1, $number2, $operation)
        ];
    };
    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}
