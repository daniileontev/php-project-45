<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\getStartGame;

const GAMERULE = 'Find the greatest common divisor of given numbers.';

function runner(): void
{
    $getData = function () {
        $num1 = mt_rand(1, 100);
        $num2 = mt_rand(1, 100);
        $question = "$num1 $num2";
        $correctAnswer = dividerCheck($num1, $num2);

        return array($question, $correctAnswer);
    };
    getStartGame(GAMERULE, $getData);
}

function dividerCheck(int $num1, int $num2): int
{
    while ($num2 != 0) {
        $tmp = $num1 % $num2;
        $num1 = $num2;
        $num2 = $tmp;
    }
    return $num1;
}
