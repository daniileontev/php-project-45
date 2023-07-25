<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const GAME_RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num): bool
{
    if ($num <= 1) {
        return false; // числа 0 и 1 не являются простыми
    }

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function getGameData(): array
{
    $gameData = [];
    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $question = mt_rand(1, 100);
        $correctAnswer = (string) isPrime($question) ? "yes" : "no";
        $gameData[$i] = [$question, $correctAnswer];
    }
    return $gameData;
}

function run(): void
{
    runGame(GAME_RULE, getGameData());
}
