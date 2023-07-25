<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_RULE = 'Find the greatest common divisor of given numbers.';

function getGcd(int $num1, int $num2): int
{
    while ($num2 != 0) {
        $tmp = $num1 % $num2;
        $num1 = $num2;
        $num2 = $tmp;
    }
    return $num1;
}

function getGameData(): array
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $num1 = mt_rand(1, 100);
        $num2 = mt_rand(1, 100);
        $question = "$num1 $num2";
        $correctAnswer = (string) getGcd($num1, $num2);
        $gameData[$i] = [$question, $correctAnswer];
    }
    return $gameData;
}

function run(): void
{
    runGame(GAME_RULE, getGameData());
}
