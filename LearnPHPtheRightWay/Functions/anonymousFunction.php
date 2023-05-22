<?php

$sumVar = function (int|float...$numbers): int|float
{
  echo "Ausgabe sumVar: ";
  return array_sum($numbers);
}; // anonymous function braucht abschliessendes Semikolon;

// Aufrufbarkeit überprüfen
if (is_callable($sumVar)) {
  echo $sumVar(4, 63, 6, 3, 6);
} else {
  echo 'nicht aufrufbare Funktion: $sumVar';
}

