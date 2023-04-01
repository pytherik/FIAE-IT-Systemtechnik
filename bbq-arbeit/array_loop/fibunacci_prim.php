<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
      body {
          background-color: #444;
          color: #ddd;
      }
  </style>
</head>
<body>
<h1>Aufgabe 1</h1>
<?php

// 1. Erstelle ein Array mit folgender Zahlenfolge
// 0 1 1 2 3 5 8 13 21 ....
// es soll keine Zahl vorkommen die > 1000 ist

$i = 1;
$fib[] = 0;
while($i <= 1000) {
  $fib[] = $i;
  $i = $fib[count($fib)-1] + $fib[count($fib)-2];
}
echo "<pre>";
print_r($fib);
echo "</pre>";

?>

<h1>Aufgabe 2</h1>

<?php
// 2. Erstelle ein Array mit allen positiven Zahlen, die <= 900 sind,
// diese Zahlen sollen nicht durch 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31 teilbar sein

$j = 2;
$badNumbers = [2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31];
$primes = [];
while ($j <= 900) {
  $isPrime = true;
  foreach($badNumbers as $badNumber) {
    if ($j % $badNumber === 0) {
      $isPrime = false;
      break;
    }
  }
  if ($isPrime === true) {
    $primes[] = $j;
  }
  $j++;
}
$total = array_merge(array($primes, $badNumbers));

echo "<pre>";
print_r($total);
echo "</pre>";
?>
</body>
</html>
