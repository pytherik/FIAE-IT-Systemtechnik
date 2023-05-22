<?php

require '../helpers.php';

/* Syntax:

array_map(callable|null $callback, array $array, array ...$arrays): array

*/

$array = [1, 2, 3, 4, 5, 6];

$arr = array_map(fn($el) => $el * 3, $array);
ppa($arr);

$array2 = [1, 2, 3];
$array3 = [4, 5, 6];

$arr = array_map(fn($el1, $el2) => $el1 * $el2, $array2, $array3);
ppa($arr);

// mit Assoziativen Arrays
$arr1 = ['a' => 2, 'b' => 4, 'c' => 6];
$arr2 = ['d' => 3, 'e' => 5, 'f' => 7];
// oder gemischt
# $arr2 = [4, 5, 6];

// die Array-Keys im Ergebnis werden numeriert, 'a', 'b', ... sind weg!
$arr = array_map(fn($el1, $el2) => $el1 * $el2, $arr1, $arr2);
ppa($arr);

/* Arrays können unterschiedlich Lang sein,
die zusätzlichen Werte des längeren Arrays ergeben bei Multiplikation 0,
bei Addition den Wert ihrer selbst!
*/


