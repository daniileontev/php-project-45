<?php

namespace BrainGames\src\Engine;

/*
 * rules for games messages
 */

function brainGameRule(string $gameName): void
{

    switch ($gameName) {
        case "calc":
            echo("What is the result of the expression?\n");
            break;
        case "even":
            echo("Answer 'yes' if the number is even, otherwise answer 'no'.\n");
            break;
        case 'gcd':
            echo("Find the greatest common divisor of given numbers.\n");
            break;
        case "progression":
            echo("What number is missing in the progression?\n");
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
