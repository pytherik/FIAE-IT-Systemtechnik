<?php

echo "PHP_FLOAT_MAX = " . PHP_FLOAT_MAX . "<br/>";
echo "PHP_FLOAT_MIN = " . PHP_FLOAT_MIN . "<br/>";
echo "<br/>4.2e1 = " .  4.2e1 . "<br/>";
echo "<br/>42e-3 = " . 42.e-3 . "<br/>";

echo '<br/>var_dump(42e3) ist nicht integer: ';
var_dump(42e3);

// Float Zahlen werden binär berechnet. Dadurch kommt es zu Ungenauigkeiten

echo '<br/>floor((0.1 + 0.7) * 10) = '. floor((0.1 + 0.7) * 10);
echo '<br/>ceil((0.1 + 0.2) * 10) = '. ceil((0.1 + 0.2) * 10);
for ($i = 0; $i < 2; $i += 0.1) {
  echo number_format($i, 18) . '<br>';
}
for ($i = 0; $i < 1; $i += 0.1) {
  echo $i-0.1." + 0.1 = ". number_format($i, 18) . '<br>';
}

// deshalb darf man eine Kontrollstruktur nicht durch Vergleichen
// von Float Werten aufbauen