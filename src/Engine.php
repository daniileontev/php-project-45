<?php

namespace BrainGames\src\Engine;

/*
 * start communication and games
 */

use function BrainGames\src\Cli\greeting;

function getStart(string $gameName): void
{
    $userName = greeting();
    switch ($gameName) {
        case "calc":
            echo("What is the result of the expression?\n");
            startCalcGame($userName);
            break;
        case "even":
            echo("Answer 'yes' if the number is even, otherwise answer 'no'.\n");
            startEvenGame($userName);
            break;
        case 'gcd':
            echo("Find the greatest common divisor of given numbers.\n");
            startGcdGame($userName);
            break;
        case "progression":
            echo("What number is missing in the progression?\n");
            startProgressionGame($userName);
            break;
        case "prime":
            echo ("Answer 'yes' if given number is prime. Otherwise answer 'no'.\n");
            startPrimeGame($userName);
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
    return mt_rand(1, 10);
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

/*
 * brain-gcd functions
 */

function dividerCheck($num1, $num2)
{
    while ($num2 != 0) {
        $tmp = $num1 % $num2;
        $num1 = $num2;
        $num2 = $tmp;
    }
    return $num1;
}
/*
 * brain-prime functions
 */

function isPrime($num): bool
{
    $n = 0;
    for ($i = 2; $i < ($num / 2 + 1); $i++) {
        if ($num % $i == 0) {
            $n++;
            break;
        }
    }
    if ($n == 0) {
        return true;
    } else {
        return false;
    }
}
