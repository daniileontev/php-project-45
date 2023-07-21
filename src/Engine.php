<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const GAME_ROUNDS = 3;

function getStartGame(string $task, array $gameData)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($task);

    for ($i = 0; $i < GAME_ROUNDS; $i += 1) {
        $expression = $gameData[$i][0];
        $correctAnswer = (string) $gameData[$i][1];

        line("Question: %s", (string) $expression);

        $answer = prompt('Your answer');

        if ($answer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);

            line("Let's try again, %s!", $name);
            return;
        }
        line('Correct!');
    }
    return line("Congratulations, %s!", $name);
}
