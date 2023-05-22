<?php

$sum = function (closure $callme, int|float ...$nums): int|float {
  // die Funktion $callme ('mul' oder anonymous) wird
  // beim return mit dem  Ergebnis von $sum aufgerufen
  return $callme(array_sum($nums));
};

// php konvertiert anonymous functions zu Instanzen von closures
// im Gegensatz zu closures können callables auch normale Funktionen sein
echo $sum(function ($el) {
  return $el * 2;
}, 1, 2, 3, 4);