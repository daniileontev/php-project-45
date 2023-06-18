<?php

namespace BrainGames\Gcd;

function startGcdGame()
{

        $num1 = mt_rand(1, 100);
        $num2 = mt_rand(1, 100);
        $question = "$num1 $num2";
        $correctAnswer = dividerCheck($num1, $num2);

        return array($question, $correctAnswer);
}

function dividerCheck($num1, $num2)
{
    while ($num2 != 0) {
        $tmp = $num1 % $num2;
        $num1 = $num2;
        $num2 = $tmp;
    }
    return $num1;
}
