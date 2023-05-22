<?php
// eine Funktion für 'echo "<pre>"; print_r($arr); echo "</pre>";'
require '../helpers.php';

/* Syntax:

array_filter(array $array, callable|null $callback=null, int mode=0): array

*/

$arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

$even = array_filter($arr, fn($el) => $el %2 === 0);
ppa($even);
$even2 = array_filter($arr, fn($el) => $el %2 === 0, ARRAY_FILTER_USE_KEY);
ppa($even2);
$even3 = array_filter($arr, fn($el) => $el %2 === 0, ARRAY_FILTER_USE_BOTH);
ppa($even3);

// Lücken in der Numerierung der keys eliminieren:
echo "<br/><h4>Eliminate key-gaps</h4>";
$even3 = array_values($even3);
ppa($even3);

//$even2 = array_values($even2);
//ppa($even2);
//$even = array_values($even);
//ppa($even);

echo "<br/><h4>[3] (false) und [6] ([]) werden gefiltert</h4>";

$arr2 = [1, 2, 3, false, 4, 5, [], 6, 7, 8, 9, 10];
$simple = array_filter($arr2);
ppa($simple);
