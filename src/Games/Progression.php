<?php

namespace Src\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Src\Engine\greeting;

function checkAnswer($correctAnswer, $answer, $name)
{
    $result = '';
    if ($correctAnswer === $answer) {
        $result = ("Correct!");
    } elseif ($correctAnswer !== $answer) {
        die("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
    }
    return $result;
}

function brainProgression()
{
    $name = greeting();
    line('What number is missing in the progression?');
    $win = [];
    for ($i = 0; $i < 3; $i++) {
        $start = rand(2, 10);
        $step = rand(2, 9);
        $maxEnd = 120;
        $progression = range($start, $maxEnd, $step);
        $strProgression = implode(" ", $progression);
        $array = explode(" ", $strProgression);
        $randNum3 = rand(1, count($array));
        $replacement = array_splice($array, $randNum3, 1, "..");
        $inQuestion = implode(" ", $array);
        $inAnswer = implode(" ", $replacement);
        $question = [];
        $question = ("Question: $inQuestion");
        line($question);
        $answer = prompt("Your answer");
        $last = checkAnswer($inAnswer, $answer, $name);
        line($last);
        $win[] = $last[$i];
        if (count($win) === 3) {
            line("Congratulations, $name!");
        }
    }
}