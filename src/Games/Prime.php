<?php

namespace Src\Games\Prime;

use function Src\Engine\playGame;

const GAME_NAME = 'Prime';
const GAME_DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num <= 1 || $num % 2 === 0 || $num % 3 === 0) {
        return false;
    } elseif ($num === 2 || $num === 3) {
        return true;
    } else {
        for ($i = 5; $i < $num; $i++) {
            if ($num % $i === 0) {
                return false;
            }
        }
        return true;
    }
}

function play(): void
{
    $generateTask = function (): array {
        $number = rand(1, 99);
        return [
            'question' => $number,
            'answer' => isPrime($number) ? 'yes' : 'no'
        ];
    };
    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}
