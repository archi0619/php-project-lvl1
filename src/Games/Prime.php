<?php

namespace Src\Games\Prime;

use function Src\Engine\play;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime($num): bool
{
    if ($num <= 1) {
        return false;
    }
    for ($divisor = 2; $divisor <= $num / 2; $divisor++) {
        if ($num % $divisor === 0) {
            return false;
        }
    }
    return true;
}

function brainPrime()
{
    $getGame = function () {
        $question = rand(1, 99);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    play($getGame, DESCRIPTION);
}
