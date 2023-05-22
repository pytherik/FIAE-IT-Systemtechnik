<?php

require '../helpers.php';

$array = [1, 2, 3, 4];

[$a, $b, $c, $d] = $array;
// oder
// list($a, $b, $c, $d) = $array;

echo "a = $a, b = $b, c = $c, d = $d<br>";

[$a, , $c, $d] = $array;
echo "a = $a, b = , c = $c, d = $d<br>";

$array2 = [1, 3, [2, 5]];

[$a,,[$b, $c]] = $array2;

echo "a = $a, b = $b, c = $c";