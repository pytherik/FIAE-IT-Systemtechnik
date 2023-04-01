<!doctype html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=">
    <title>pampeldoc</title>
    <style>
        body {
            background-color: #444;
            color: #ddd;
            font-size: 1.4rem;
        }

        table,
        th,
        td {
            border: 1px solid #777;
        }
    </style>
</head>
<body>
<?php
// Aufgaben zu Funktionen
// 1. Schreibe eine Funktion, die zu einem Durchmesser den Umfang eines Kreises berechnet.
// 2. Schreibe eine Funktion, die zu dem Durchmesser die Fläche des Kreises berechnet.
// 3. siehe fahrenheit2Celsius.php
// 4. siehe dotToComma
// 5. siehe createTable.php
function circumference(float $diameter): float
{
  $pi = pi();
  return round(($diameter * $pi), 4);
}

echo "Der Kreisumfang eines Kreises mit dem Durchmesser 4.20m beträgt: " . circumference(4.2) . "m";

echo "<hr>";

function area(float $diameter): float
{
  $pi = pi();
  return round(((($diameter / 2) * $pi) ** 2), 4);
}

echo "Die Fläche eines Kreises mit dem Durchmesser 4.20m beträgt: " . area(4.2) . "m²";
echo "<hr>";

function hypotenuse(float $a, float $b): float
{
  return round(sqrt(($a ** 2) + ($b ** 2)), 2);
}

echo "Die Hypotenuse eines Dreiecks mit den Seitenlängen a = 13cm, b = 22cm beträgt " . hypotenuse(13, 22) . "cm.";
echo "<hr>";
?>


</body>
</html>