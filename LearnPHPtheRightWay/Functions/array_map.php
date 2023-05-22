<?php

$array = [1, 2, 3, 4];

//$array2 = array_map(function($el) {
//  return $el * 2;
//}, $array);

/* oder */

$callme = function ($el) {
  return $el * 2;
};

$array2 = array_map($callme, $array);


echo "<pre>";
print_r($array);
echo "</pre>";

echo "<pre>";
print_r($array2);
echo "</pre>";