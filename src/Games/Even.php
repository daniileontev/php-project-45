<?php

namespace BrainGames\Even;

use function BrainGames\Engine\getStartGame;

const GAMERULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function runner(): void
{
    $getData = function () {

        $question = mt_rand(1, 100);
        $correctAnswer = numCheck($question) ? "yes" : "no";

        return array($question, $correctAnswer);
    };

    getStartGame(GAMERULE, $getData);
}

function numCheck(int $number): bool
{
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
    }
}
