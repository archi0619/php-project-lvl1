<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\play;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
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

function playGame(): void
{
    $getGame = function () {
        $question = rand(1, 99);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };

    play($getGame, DESCRIPTION);
}
