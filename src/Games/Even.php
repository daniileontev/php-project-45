<?php

namespace BrainGames\Even;

function startEvenGame(): array
{
    $question = mt_rand(1, 100);
    $correctAnswer = numCheck($question) ? "yes" : "no";

    return array($question, $correctAnswer);
}

function numCheck($number): bool
{
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
    }
}
