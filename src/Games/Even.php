<?php

namespace BrainGames\Even;

use function BrainGames\Engine\getStartGame;

use const BrainGames\Engine\GAME_ROUNDS;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 == 0;
}

function getGameData(): array
{
    $gameData = [];
    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $question = mt_rand(1, 100);
        $correctAnswer = isEven($question) ? "yes" : "no";
        $gameData[$i] = [$question, $correctAnswer];
    }
    return $gameData;
}

function runner(): void
{
    getStartGame(GAME_RULE, getGameData());
}
