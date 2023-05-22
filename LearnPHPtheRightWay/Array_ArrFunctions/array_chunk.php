<?php

/* Syntax :

array_chunk(array $array, int $length, bool $preserveKeys=false): array

*/

$array = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5 ];

echo "<pre>";
print_r(array_chunk($array, 2));
print_r(array_chunk($array, 3, true));
echo "</pre>";

