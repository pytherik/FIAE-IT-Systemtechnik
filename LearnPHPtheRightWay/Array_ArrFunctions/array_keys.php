<?php

require '../helpers.php';

/* Syntax

array_keys(array $array, mixed $search_value, bool $strict=false): array

*/

$array = ['a' => 5, 'b' => 10, 'c' => 15, 'd' => 5, 'e' => 10];

$keys = array_keys($array);
ppa($keys);

$keys = array_keys($array, '10');
ppa($keys);

$keys = array_keys($array, '10', true);
ppa($keys);

