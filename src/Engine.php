<?php

namespace BrainGames\src\Engine;

/*
 * greetings messages
 * не смог понять, как правильно вывести приветствие, при этом переиспользовать $name в bin файлах. (прим закоменченый)
 */

//function brainGameGreetings(string $gameName): void
//{
//    echo("Welcome to the Brain Games!\n");
//    echo("May I have your name? ");
//    $name = trim(fgets(STDIN));
//    echo "Hello, {$name}!\n";
//    switch ($gameName) {
//        case 'calc':
//            echo("What is the result of the expression?\n");
//            break;
//        case 'even':
//            echo('Answer "yes" if the number is even, otherwise answer "no".' . "\n");
//            break;
//        default:
//            echo "Unknown game specified!\n";
//            break;
//    }
//}
function brainGameGreetings(string $gameName): void
{
    switch ($gameName) {
        case 'calc':
            echo("What is the result of the expression?\n");
            break;
        case 'even':
            echo('Answer "yes" if the number is even, otherwise answer "no".' . "\n");
            break;
        default:
            echo "Unknown game specified!\n";
            break;
    }
}

/*
 * brain-calc functions
 */

function generateNumber(): int
{
    return mt_rand(1, 25);
}

function addition($num1, $num2)
{
    return $num1 + $num2;
}

function subtraction($num1, $num2)
{
    return $num1 - $num2;
}
function multiplication($num1, $num2): float|int
{
    return $num1 * $num2;
}

/*
 * brain-even functions
 */

function numCheck($number): bool
{
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

function startBrainEvenGame(): void
{
    echo("Welcome to the Brain Games!\n");
    echo("May I have your name? ");
    $name = trim(fgets(STDIN));
    echo "Hello, {$name}!\n";
    brainGameGreetings('even');

    $isCorrect = true;
    $correctAnswerCount = 0;
    while ($isCorrect && $correctAnswerCount < 3) {
        $numGenerate = mt_rand(1, 100);
        echo("Question: {$numGenerate}\n");
        $userAnswer = trim(fgets(STDIN));
        echo("Your answer: {$userAnswer}\n");
        if (!numCheck($numGenerate) && $userAnswer === 'no') {
            echo "Correct!\n";
            $correctAnswerCount++;
        } elseif (numCheck($numGenerate) && $userAnswer === 'yes') {
            echo "Correct!\n";
            $correctAnswerCount++;
        } else {
            $isCorrect = false;
            echo "'{$userAnswer}' is the wrong answer ;(. The correct answer was"
            . (!numCheck($numGenerate) ? ' no' : ' yes') . ".\n"
            . "Let's try again, {$name}!\n";
        }
        if ($correctAnswerCount === 3) {
            $isCorrect = false;
            echo "Congratulations, {$name}!\n";
        }
    }
}

function startBrainCalcGame(): void
{
    echo("Welcome to the Brain Games!\n");
    echo("May I have your name? ");
    $name = trim(fgets(STDIN));
    echo "Hello, {$name}!\n";

    brainGameGreetings('calc');

    $isCorrect = true;
    $correctAnswerCount = 0;
    while ($isCorrect && $correctAnswerCount < 3) {
        if ($correctAnswerCount == 0) {
            $questionType = 1;
        } elseif ($correctAnswerCount == 1) {
            $questionType = 2;
        } elseif ($correctAnswerCount == 2) {
            $questionType = 3;
        }

        $numGenerator1 = generateNumber();
        $numGenerator2 = generateNumber();

        if ($questionType == 1) {
            $operator = '+';
            $correctAnswer = addition($numGenerator1, $numGenerator2);
        } elseif ($questionType == 2) {
            $operator = '-';
            $correctAnswer = subtraction($numGenerator1, $numGenerator2);
        } elseif ($questionType == 3) {
            $operator = '*';
            $correctAnswer = multiplication($numGenerator1, $numGenerator2);
        }

        echo("Question: {$numGenerator1} {$operator} {$numGenerator2}\n");
        $userAnswer = trim(fgets(STDIN));
        echo("Your answer: {$userAnswer}\n");

        if ($userAnswer == $correctAnswer) {
            echo "Correct!\n";
            $correctAnswerCount++;
        } else {
            echo "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'\n";
            $isCorrect = false;
        }
        if ($correctAnswerCount === 3) {
            $isCorrect = false;
            echo "Congratulations, {$name}!\n";
        }
    }
}
