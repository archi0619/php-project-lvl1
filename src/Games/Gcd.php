<?php

namespace Src\Games\Gcd;

use function Src\Engine\play;

const DESCRIPTION = "Find the greatest common divisor of given numbers.";

function gcd(int $firstNum, int $secondNum): int
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

function brainGCD():void
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
