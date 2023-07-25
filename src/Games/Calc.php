<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_RULE = 'What is the result of the expression?';


function calc(int $num1, int $num2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception('Invalid operator');
    }
}

function runCalc(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $num1 = mt_rand(0, 10);
        $num2 = mt_rand(0, 20);
        $operators = ['+', '-', '*'];
        $operator = $operators[array_rand($operators)];
        $correctAnswer = (string) calc($num1, $num2, $operator);
        $question = "$num1 $operator $num2";

        $gameData[$i] = [$question, $correctAnswer];
    }
    runGame(GAME_RULE, $gameData);
}
