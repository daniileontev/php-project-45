<?php

namespace BrainGames\Engine;

use function Cli\line;
use function Cli\prompt;

function getGameLogic(string $gameName)
{
    switch ($gameName) {
        case "calc":
            $gameRule = 'What is the result of the expression?';
            $gameLogic = "BrainGames\Calc\startCalcGame";
            return [$gameRule, $gameLogic];
        case "even":
            $gameRule = 'Answer "yes" if the number is even, otherwise answer "no".';
            $gameLogic = "BrainGames\Even\startEvenGame";
            return [$gameRule, $gameLogic];
        case 'gcd':
            $gameRule = "Find the greatest common divisor of given numbers.";
            $gameLogic = "BrainGames\Gcd\startGcdGame";
            return [$gameRule, $gameLogic];
        case "progression":
            $gameRule = "What number is missing in the progression?";
            $gameLogic = "BrainGames\Progression\startProgressionGame";
            return [$gameRule, $gameLogic];
        case "prime":
            $gameRule = 'Answer "yes" if given number is prime. Otherwise answer "no".';
            $gameLogic = "BrainGames\Prime\startPrimeGame";
            return [$gameRule, $gameLogic];
        default:
            echo "Unknown game specified!\n";
            exit(1);
    }
}

function getStartGame(string $name, string $game): void
{
    [$gameRule, $gameLogic] = getGameLogic($game);
    line($gameRule);
    $correctAnswerCount = 0;
    while ($correctAnswerCount < 3) {
        [$question, $correctAnswer] = $gameLogic();
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
