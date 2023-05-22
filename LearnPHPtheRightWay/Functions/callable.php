<?php

$sum = function (callable $callme, int|float ...$nums): int|float {
  // die Funktion $callme ('mul' oder anonymous) wird
  // beim return mit dem  Ergebnis von $sum aufgerufen
  return $callme(array_sum($nums));
};


//echo $sum('mul', 1, 2, 3, 4);
//
//function mul(int|float $el): int|float
//{
//  return $el * 2;
//}

/* oder als anonymous funktion */

echo $sum(function ($el) {
  return $el * 2;
}, 1, 2, 3, 4);