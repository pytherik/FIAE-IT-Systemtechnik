<?php

require '../helpers.php';

/* Syntax

array_merge(array ...$arrays): array

 */
$arr1 = [1, 2, 3];
$arr2 = [4, 5, 6];
$arr3 = [7, 8, 9];

$merged = array_merge($arr1, $arr2, $arr3);
ppa($merged);

$arr1 = [1, 2, 3];
$arr2 = [10 => 4, 12 => 5, 13 => 6];
$arr3 = [7, 8, 9];

$merged = array_merge($arr1, $arr2, $arr3);
ppa($merged);

$arr1 = [1, 2, 3];
$arr2 = ['a' => 4, 'b' => 5, 'c' => 6];
$arr3 = [7, 8, 9, 'b' => 10];

$merged = array_merge($arr1, $arr2, $arr3);
ppa($merged);