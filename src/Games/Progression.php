<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\play;

const DESCRIPTION = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 15;

function makeProgression(int $start, int $step, int $progressionLength = 15): array
{
    $result = [];
    for ($i = 0; $i < $progressionLength; $i++) {
        $result[] = $start + $step * $i;
    }
    return $result;
}

function playGame(): void
{
    $getGame = function () {

        $start = rand(0, 20);
        $step = rand(2, 15);

        $progression = makeProgression($start, $step, PROGRESSION_LENGTH);
        $hiddenMemberSpace = rand(0, PROGRESSION_LENGTH - 1);

        $correctAnswer = (string)$progression[$hiddenMemberSpace];
        $progression[$hiddenMemberSpace] = '..';
        $question = implode(' ', $progression);

        return [$question, $correctAnswer];
    };
    play($getGame, DESCRIPTION);
}
