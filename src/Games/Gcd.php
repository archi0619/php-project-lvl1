<?php

namespace Src\Games\Gcd;

use function Src\Engine\playGame;

const GAME_NAME = 'Gcd';
const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function play(): void
{
    $generateTask = function (): array {
        $number1 = rand(1, 99);
        $number2 = rand(1, 99);
        $divisors = array_intersect(gcd($number1),gcd($number2));
        return [
            'question' => "{$number1} {$number2}",
            'answer' => end($divisors)
        ];
    };
    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}

function gcd(int $num): array
{
    $divisors = [];

    for ($i = 1; $i <= $num; $i++) {
        if (is_int($num / $i)) {
            $divisors[] = $i;
        }
    }
    return $divisors;
}
