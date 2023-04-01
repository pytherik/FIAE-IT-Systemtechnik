<?php
$b = 'abc';
$c = $b;

$b = 'def';

echo '$b='.$b;
echo '<br>';
echo '$c='.$c;

$d = &$b;
echo '<br>';
$b = 'ABCDE';

// $d verweist auf den Speicherplatz von $b, deshalb wird ABCDE ausgegeben
echo $d;

