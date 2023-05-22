<?php


$x = 1000;
echo '$x = '.$x.' wird in die Funktion geschickt.<br/>';

// $x kann auch per reference übergeben werden:  use(&$x)
$sum = function(int|float ...$numbers) use($x): void
{
  $x += 100;
  echo "Berechnung Summe: ".array_sum($numbers);
  echo '<br/>in Funktion äußeres $x + 100 = ' . $x;
};

$sum(1,2,3,4);

echo '<br/>$x hat sich außen nicht verändert: '. $x;

