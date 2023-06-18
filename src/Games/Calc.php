<?php

namespace BrainGames\Calc;

function startCalcGame(): array
{
    $num1 = mt_rand(0, 10);
    $num2 = mt_rand(0, 20);
    $operator = mt_rand(1, 3);
    $correctAnswer = '';
    $question = '';

    switch ($operator) {
        case 1:
            $question = "$num1 + $num2";
            $correctAnswer = $num1 + $num2;
            break;
        case 2:
            $question = "$num1 * {$num2}";
            $correctAnswer = $num1 * $num2;
            break;
        case 3:
            $question = "$num1 - $num2";
            $correctAnswer = $num1 - $num2;
            break;
    }
    return array($question, $correctAnswer);
}
