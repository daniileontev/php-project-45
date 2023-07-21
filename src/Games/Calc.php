<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\getStartGame;

use const BrainGames\Engine\GAME_ROUNDS;

const GAME_RULE = 'What is the result of the expression?';


function getCorrectAnswer(int $num1, int $num2, string $operator): int
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

function getGameData(): array
{
    $gameData = [];
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $num1 = mt_rand(0, 10);
        $num2 = mt_rand(0, 20);
        $operators = ['+', '-', '*'];
        $operator = $operators[array_rand($operators)];
        $correctAnswer = getCorrectAnswer($num1, $num2, $operator);
        $question = "$num1 $operator $num2";

        $gameData[$i] = [$question, $correctAnswer];
    }
    return $gameData;
}

function runner(): void
{
    getStartGame(GAME_RULE, getGameData());
}
