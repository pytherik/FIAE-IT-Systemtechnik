<?php

$array = [1, 2, 3, 4];

$array2 = array_map(function($el) {
  return $el * $el;
}, $array);

echo "<pre>";
print_r($array2);
echo "</pre>";

/* arrow functions können nur einen Ausdruck enthalten */
echo implode(' - ', array_map(fn($el) => $el * $el, $array));

echo "<br/>";
/* es können äußere Variablen benutzt werden */
$y = 5;
echo implode(' - ', array_map(fn($el) => $el * $y, $array));
