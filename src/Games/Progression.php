<?php

namespace Src\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;

function randomProgression() :array
{
    $start = rand(0, 10);
    $step = rand(1, 10);
    $randomRange = rand(5, 10);
    $endSequence = $start + ($step * $randomRange);
    $result = range($start, $endSequence, $step);
    return $result;
}

function brainProgression() 
{
    $name = greeting();
    line('What number is missing in the progression?');
    for ($i = 0; $i < 3; $i++) {
        $progression = randomProgression();
        $randomReplacementIndex = array_rand($progression);
        $answer = $progression[$randomReplacementIndex];
        $progression[$randomReplacementIndex] = "..";
        $question = implode(' ', $progression);
        line("Question: $question");
        $inAnswer = prompt("Your answer ");
        $correctAnswer = $answer;
        if ($inAnswer == $correctAnswer) {
            line("Correct!");
        } else {
            return line("'$inAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
        }
    }
    line("Congratulations, $name!");
}
