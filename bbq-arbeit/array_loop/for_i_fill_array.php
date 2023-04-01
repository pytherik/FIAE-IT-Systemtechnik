<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    body °°  </style>
</head>
<body>

<?php
// Erstelle mit einer Schleife ein Array mit den Zahlen 2, 3, 4, 5
// erstelle ein Array und  fülle es mit einer Schleife mit den Zahlen 2, 3, 4, 5

// Nimm dieses Array und gib, mithilfe einer Schleife, deren Werte einzeln untereinander aus

$numbers = [];

for ($i = 0; $i <= 3; $i++) {
  $numbers[$i] = $i + 2;
}

for ($i = 0; $i < count($numbers); $i++) {
  echo "$numbers[$i]<br>";
}
//$evenNumbers[0] = 2;
//$evenNumbers[1] = 4;
//$evenNumbers[2] = 6;

// erstelle ein Array mit allen geraden Zahlen von 0 bis 100 einschließlich, die Zahlen sollen aufsteigend sein
$evenNumbers = [];
for ($i = 0; $i <= 49; $i++) {
  $evenNumbers[$i] = ($i + 1) * 2;
}

for ($i = 0; $i < count($evenNumbers); $i++) {
  echo "$evenNumbers[$i] ";
}
// Erstelle ein Array mit den Zahlen aufsteigend 3, 5, 7, 9, 11, ... , 131

$oddNumbers = [];
echo "<br><br>";
//for ($i = 1; $i <= 65; $i++) {
//  $oddNumbers[$i-1] = $i * 2 + 1;
//}

for ($i = 0; $i < 65; $i++) {
  $oddNumbers[$i] = $i * 2 + 3;
}

for ($i = 0; $i < count($oddNumbers); $i++) {
  echo "$oddNumbers[$i] ";
}
echo "<br><br>";

// erstell ein Array mit den Zahlen 15, 20, ... , 105
//for ($i = 0; $i < 19; $i++) {
//  $fiveSteps[$i] = $i * 5 + 15;
//}

for ($i = 15; $i <= 105; $i += 5) {
  $fiveSteps[] = $i;
}

for ($i = 0; $i < count($fiveSteps); $i++) {
  echo "$fiveSteps[$i] ";
}
echo "<br><br>";

// erstelle ein Array mit den Zahlen 0. 0.1, 0.2 ... , 1.0

for ($i = 0; $i <= 10; $i++) {
  $tenth[] = $i / 10;
}

for ($i = 0; $i < count($tenth); $i++) {
  echo "$tenth[$i] ";
}
echo "<br><br>";

// erstelle ein Array 22, 20, 18, ... , -8

for ($i = 0; $i < 16; $i++) {
  $decreation[$i] = 22 - $i * 2;
}

for ($i = 0; $i < count($decreation); $i++) {
  echo "$decreation[$i] ";
}


echo "<pre>";
print_r($decreation);
echo "</pre>";

for ($i = 'a'; $i < 'z'; $i++) {
  echo "$i ";
}
?>
</body>
</html>

