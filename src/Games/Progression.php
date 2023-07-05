<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\getStartGame;

const GAMERULE = 'What number is missing in the progression?';

function runner(): void
{
    $getData = function () {
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

        $correctAnswer = (string)$missingValue;
        return array($question, $correctAnswer);
    };
    getStartGame(GAMERULE, $getData);
}
