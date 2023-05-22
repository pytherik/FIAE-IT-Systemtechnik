<?php

require '../helpers.php';

/* Syntax:

array_search(mixed $needle, array $haystack, bool $strict=false): int|string|false
in_array(mixed $needle, array $haystack, bool $strict=false): bool

*/

$array = ['a', 'b', 'c', 'D', 'E', 'ab', 'bc', 'cd', 'b', 'd'];

// findet nur den ersten passenden Wert:
$key = array_search('b', $array);
var_dump($key);

echo "<br/>";

$key = in_array('b', $array);
var_dump($key);

