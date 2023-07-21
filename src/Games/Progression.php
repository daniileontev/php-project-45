<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\getStartGame;

use const BrainGames\Engine\GAME_ROUNDS;

const GAME_RULE = 'What number is missing in the progression?';


function getProgression()
{
    $startingNumber = mt_rand(1, 35);
    $step = mt_rand(2, 5);
    $length = 10;

    $progression = [];

    for ($i = 0; $i < $length; $i += 1) {
        $progression[] = $startingNumber + $i * $step;
    }
    return $progression;
}


function getGameData(): array
{
    $result = [];
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $progression = getProgression();
        $hiddenNum = mt_rand(0, 9);
        $correctAnswer = $progression[$hiddenNum];
        $progression[$hiddenNum] = '..';
        $progressionLine = (implode(' ', $progression));
        $result[] = [$progressionLine, $correctAnswer];
    }
    return $result;
}


function runner(): void
{
    getStartGame(GAME_RULE, getGameData());
}
