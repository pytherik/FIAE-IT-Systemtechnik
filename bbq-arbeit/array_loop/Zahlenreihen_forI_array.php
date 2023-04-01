<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title></title>
  <style>
    body °°  </style>
</head>
<body>

<?php
// Erstelle mit einer Schleife ein Array mit den Zahlen [2, 3, 4, 5].
// Gib mithilfe einer Schleife die Werte des Arrays einzeln untereinander aus.
$numbers = [];

for ($i = 0; $i <= 3; $i++) {
  $numbers[$i] = $i + 2;
}

for ($i = 0; $i < count($numbers); $i++) {
  echo "$numbers[$i]<br>";
}

// Erstelle ein Array mit allen geraden Zahlen von 0 bis 100 einschließlich. Die Zahlen sollen aufsteigend sein
$evenNumbers = [];
for ($i = 0; $i <= 49; $i++) {
  $evenNumbers[$i] = ($i + 1) * 2;
}

// Ausgabe der Werte aus $evenNumbers.
for ($i = 0; $i < count($evenNumbers); $i++) {
  echo "$evenNumbers[$i] ";
}

// Erstelle ein Array mit den Zahlen aufsteigend [3, 5, 7, 9, 11, ... , 131].
$oddNumbers = [];
echo "<br><br>";

for ($i = 0; $i < 65; $i++) {
  $oddNumbers[$i] = $i * 2 + 3;
}

// Ausgabe der Werte aus $oddNumbers.
for ($i = 0; $i < count($oddNumbers); $i++) {
  echo "$oddNumbers[$i] ";
}
echo "<br><br>";

// Erstelle ein Array mit den Zahlen [15, 20, ... , 105].
for ($i = 15; $i <= 105; $i += 5) {
  $fiveSteps[] = $i;
}

// Alternative:
for ($i = 0; $i < 19; $i++) {
  $fiveSteps[$i] = $i * 5 + 15;
}

for ($i = 0; $i < count($fiveSteps); $i++) {
  echo "$fiveSteps[$i] ";
}
echo "<br><br>";

// Erstelle ein Array mit den Zahlen [0. 0.1, 0.2 ... , 1.0].
for ($i = 0; $i <= 10; $i++) {
  $tenth[] = $i / 10;
}

for ($i = 0; $i < count($tenth); $i++) {
  echo "$tenth[$i] ";
}
echo "<br><br>";

// Erstelle ein Array [22, 20, 18, ... , -8].
for ($i = 0; $i < 16; $i++) {
  $decreation[$i] = 22 - $i * 2;
}

for ($i = 0; $i < count($decreation); $i++) {
  echo "$decreation[$i] ";
}


echo "<pre>";
print_r($decreation);
echo "</pre>";

// Auch Strings können inkrementiert werden.
// Achtung: Dekrementieren gibt eine Endlosschleife !!
for ($i = 'a'; $i < 'z'; $i++) {
  echo "$i ";
}


?>
</body>
</html>

