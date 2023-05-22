<?php

require '../helpers.php';

/* Syntax

array_diff(array $array, array ...$arrays): array

*/


$array1 = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' =>5];
$array2 = ['f' => 4, 'g' => 5, 'i' => 6, 'j' => 7, 'k' =>8];
$array3 = ['l' => 3, 'm' => 9, 'n' => 10];

echo "<h3>Array 1: </h3>";
ppa(array_diff($array1, $array2, $array3));
echo "<h3>Array 2: </h3>";
ppa(array_diff($array2, $array1, $array3));
echo "<h3>Array 3: </h3>";
ppa(array_diff($array3, $array2, $array1));
// assoc: key und value müssen übereinstimmen
echo "<h3>Assoziativ Array 1: </h3>";
ppa(array_diff_assoc($array1, $array2, $array3));
