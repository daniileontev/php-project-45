<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function getStartGame(string $line, callable $runner): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('%s', $line);

    $correctAnswerCount = 0;
    while ($correctAnswerCount < 3) {
        [$question, $correctAnswer] = $runner();
        line("Question: %s", $question);

        $userAnswer = prompt('Your answer');

        if ($userAnswer === strval($correctAnswer)) {
            line("Correct!");
            $correctAnswerCount += 1;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line('Congratulations, %s!', $name);
}
