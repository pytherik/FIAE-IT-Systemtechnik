<?php

require '../helpers.php';

$array = ['a' => 3, 'c' => 2, 'b' => 30.2, 'd' => 9];

ppa($array);

echo "<h3>asort: </h3>";
asort($array);
ppa($array);

echo "<h3>ksort: </h3>";
ksort($array);
ppa($array);

echo "<h3>usort: </h3>";
usort($array, fn($a, $b) => $a <=> $b);
ppa($array);
