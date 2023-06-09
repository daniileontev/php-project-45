<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\getStartGame;

const GAMERULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runner(): void
{
    $getData = function () {

        $question = mt_rand(1, 100);
        $correctAnswer = isPrime($question) ? "yes" : "no";
        return array($question, $correctAnswer);
    };
    getStartGame(GAMERULE, $getData);
}

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
