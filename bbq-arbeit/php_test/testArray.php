<?php
// Ich möchte 6 Zahlen, die in Variablen vorliegen addieren

$number0 = 24;
$number1 = 13;
$number2 = 294;
$number3 = 57;
$number4 = 11;
$number5 = 2;

// Die Summe ergibt sich aus dem Addieren der einzelnen Variablen
$sum = $number0 + $number1 + $number2 + $number3 + $number4 + $number5;
//! das ist umständlich
// jetzt besser in Kurzform
$number = []; // oder $number = array();
$number = [24, 13, 294, 57, 11, 2];
// oder in Langform:
//$number[0] = 24;
//$number[1] = 13;
//$number[2] = 294;
//$number[3] = 57;
//$number[4] = 11;
//$number[5] = 2;

echo $sum . '<br>';
echo "Summe des arrays " . array_sum($number) . "<br>";

$sumNumbers = 0;
foreach ($number as $item) {
  $sumNumbers += $item;
}

echo "Nach foreach Addition : $sumNumbers<br>";

for ($i = 0; $i < sizeof($number); $i++) {
  echo $number[$i] . "<br>";
}
