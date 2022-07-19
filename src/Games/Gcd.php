<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\play;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function gcd(int $firstNum, int $secondNum): string
{
    while ($firstNum !== 0 && $secondNum !== 0) {
        if ($firstNum > $secondNum) {
            $firstNum = $firstNum % $secondNum;
        } else {
            $secondNum = $secondNum % $firstNum;
        }
    }
    return $firstNum + $secondNum;
}

function playBrainGCD(): void
{
    $getGame = function () {
        $firstNum = rand(1, 50);
        $secondNum = rand(1, 25);
        $question = "{$firstNum} {$secondNum}";
        $correctAnswer = gcd($firstNum, $secondNum);
        return [$question, $correctAnswer];
    };
    play($getGame, DESCRIPTION);
}
