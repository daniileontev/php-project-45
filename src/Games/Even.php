<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 == 0;
}

function runEven(): void
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $question = mt_rand(1, 110);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        $gameData[] = [$question, $correctAnswer];
    }
    runGame(GAME_RULE, $gameData);
}
