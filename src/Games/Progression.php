<?php

namespace Src\Games\Progression;

use function Src\Engine\playGame;

const GAME_NAME = 'Progression';
const GAME_DESCRIPTION = 'What number is missing in the progression?';

function getProgression(int $size, int $start, int $step): array
{
    $progression = [];
    for ($i = 0; $i < $size; $i++) {
        $progression[] = $start + $i * $step;
    }
    return $progression;
}

function play(): void
{
    $generateTask = function (): array {
        $progressionSize = 15;
        $progressionStart = random_int(2, 20);
        $progressionStep = random_int(2, 15);
        $progression = getProgression($progressionSize, $progressionStart, $progressionStep);
        $secretKey = array_rand($progression);
        $secretValue = $progression[$secretKey];
        $progression[$secretKey] = '..';
        return [
            'question' => implode(' ', $progression),
            'answer' => $secretValue
        ];
    };
    playGame(GAME_NAME, GAME_DESCRIPTION, $generateTask);
}
