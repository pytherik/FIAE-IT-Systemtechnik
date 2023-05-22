<?php

/* Data Types und Type Casting */

/* php bestimmt den Datentyp zur Laufzeit automatisch
   dieses Verhalten wird unterbunden mit
   declare(strict_types=1);
*/
# 4 Scalar types

# bool
$answer = true;
# int
$counter = 100;
# float
$price = 0.99;
# string
$greeting = 'Willkommen!';

echo gettype($answer).': ';
echo $answer . "<br/>"; # gibt 1 bei true und nichts bei false (keine 0)
echo gettype($counter).': ';
echo $counter . "<br/>";
echo gettype($price).': ';
echo $price . "<br/>";
echo gettype($greeting).': ';
echo $greeting . "<br/>";

echo "Ausgabe mit var_dump()<br/>";
var_dump($answer);
echo "<br/>";
var_dump($counter);
echo "<br/>";
var_dump($price);
echo "<br/>";
var_dump($greeting);
echo "<br/>";
# 4 Compound types (zusammengesetzt)

# array
# object
# iterable
# callable

# 2 Special types

# resource
# null

