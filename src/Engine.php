<?php

namespace Src\Engine;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}