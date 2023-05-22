<?php

function sum(int|float...$numbers): int|float
{
  echo "Ausgabe sum: ";
  return  array_sum($numbers);
}

$f = 'sum';

if (is_callable($f)) {
  echo $f(4, 63, 6, 3, 6);
} else {
  echo "nicht aufrufbare Funktion: $f";
}

echo "<br/>";
