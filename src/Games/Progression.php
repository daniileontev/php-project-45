<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_RULE = 'What number is missing in the progression?';


function makeProgression(int $startingNumber, int $step, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i += 1) {
        $progression[] = $startingNumber + $i * $step;
    }
    return $progression;
}


function runProgression(): void
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $startingNumber = mt_rand(1, 35);
        $step = mt_rand(2, 5);
        $length = 10;

        $progression = makeProgression($startingNumber, $step, $length);
        $hiddenNum = mt_rand(0, 9);
        $correctAnswer = (string) $progression[$hiddenNum];
        $progression[$hiddenNum] = '..';
        $progressionLine = implode(' ', $progression);
        $gameData[] = [$progressionLine, $correctAnswer];
    }
    runGame(GAME_RULE, $gameData);
}
