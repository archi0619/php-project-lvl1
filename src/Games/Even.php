<?php

namespace Src\Games\Even;

use function Src\Engine\play;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven($num): bool
{
    return $num % 2 === 0;
}
function brainEven()
{
    $getGame = function () {
        $question = rand(1, 99);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        return [$question, $correctAnswer];
    };
    play($getGame, DESCRIPTION);
}
