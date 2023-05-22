<?php

/* STRINGS */

// Konkatenation:

$firstname = 'Max';
$lastname = 'Mustermann';

echo $firstname . ' ' . $lastname . "<br/>";
echo "$firstname $lastname <br/>";
// nur zur besseren Lesbarkeit:
echo "{$firstname} {$lastname}<br/>";

// Einzelne Buchstaben erreichen:
echo '<br/>$firstname[1] ist ';
echo "zweiter Buchstabe von $firstname = " . $firstname[1] . "<br/>";

echo '<br/>$firstname[-1] ist ';
echo "letzter Buchstabe von $firstname = " . $firstname[-1] . "<br/>";

echo 'ucfirst("max") macht ';
echo ucfirst('max'). "<br/>";

echo 'lcfirst("Max") macht ';
echo lcfirst('Max'). "<br/>";

// Heredoc

$x = 1;
$y = 2;

echo "<br/>Mit Heredoc Syntax: <br>";

$text = <<<TEXT
Line 1 "$x"
Line 2 '$y'
Line 3
TEXT;

echo $text;
echo "<br/>";

// Zeilenumbrüche hinzufügen:
echo "<br/>";
echo nl2br($text);

// Nowdoc

echo "<br><br/>Mit Nowdoc Syntax: <br>";

$text = <<<'TEXT'
Line 1 "$x"
Line 2 '$y'
Line 3
TEXT;

echo $text;
echo "<br/>";
echo "<br/>";

// Zeilenumbrüche hinzufügen:

echo nl2br($text);
