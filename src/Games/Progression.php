<?php

namespace Src\Games\Progression;

use function Src\Engine\play;

const DESCRIPTION = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 15;

function makeProgression($start, $step, $progressionLength = 15)
{
    $result = [];
    for ($i = 0; $i < $progressionLength; $i++) {
        $result[] = $start + $step * $i;
    }
    return $result;
}

function makeQuestion($hiddenMemberSpace, $progression, $space = '..')
{
    $progression[$hiddenMemberSpace] = $space;
    return $progression;
}
function brainProgression()
{
    $getGame = function () {
        $start = rand(0, 20);
        $step = rand(2, 15);
        $hiddenMemberSpace = rand(0, PROGRESSION_LENGTH - 1);
        $progression = makeProgression($start, $step, PROGRESSION_LENGTH);
        $correctAnswer = (string)$progression[$hiddenMemberSpace];
        $question = implode(' ', makeQuestion($hiddenMemberSpace, $progression));
        return [$question, $correctAnswer];
    };
    play($getGame, DESCRIPTION);
}
