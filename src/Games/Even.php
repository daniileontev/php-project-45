<?php

namespace BrainGames\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 == 0;
}

function getGameData(): array
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $question = mt_rand(1, 100);
        $correctAnswer = (string) isEven($question) ? "yes" : "no";
        $gameData[$i] = [$question, $correctAnswer];
    }
    return $gameData;
}

function run(): void
{
    runGame(GAME_RULE, getGameData());
}
