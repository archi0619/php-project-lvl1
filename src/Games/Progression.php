<?php

namespace Src\Games\Progression;

use function cli\line;
use function cli\prompt;

function brainProgression(string $name): void
{
    line("What number is missing in the progression?");
    $i = 0;
    do {
        $array = [];
        $array[0] = rand(2, 20);
        $step = rand(2, 15);
        $hiddenIndex = rand(0, 14);
        for ($index = 0; $index < 15; $index++) {
            $array[] = $array[$index] + $step;
        }
        $correctAnswer = $array[$hiddenIndex];
        $array[$hiddenIndex] = "..";
        print_r("Question: ");
        foreach ($array as $number) {
            print_r("{$number} ");
        }
        print_r("\n");
        $answer = prompt('Your answer');
        if ($answer == $correctAnswer) {
            line('Correct!');
            $i++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again, %s!", $name);
            break;
        }
    } while ($i < 3);

    if ($i == 3) {
        line("Congratulations, %s!", $name);
    }
}
