<?php

namespace BrainGames\Progression;

function startProgressionGame(): array
{
    $startingNumber = mt_rand(1, 11);
    $step = mt_rand(1, 5);
    $length = 10;
    $hiddenNum = mt_rand(0, 9);
    $progression = [];
    $missingValue = null;
    $question = "";

    for ($i = 0; $i < $length; $i++) {
        $value = $startingNumber + $i * $step;
        if ($i == $hiddenNum) {
            $progression[] = "..";
            $missingValue = $value;
            $question .= ".. ";
        } else {
            $progression[] = $value;
            $question .= "$value ";
        }
    }

    $correctAnswer = (string) $missingValue;
    return array($question, $correctAnswer);
}
