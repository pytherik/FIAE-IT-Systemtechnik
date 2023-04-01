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
<?php

// Mitarbeiter Array

$employee0 = ['Anna', 'Angst', 80];
$employee1 = ['Ipek', 'Arlsan', 45];
$employee2 = ['Peter', 'Panne', 88];

$employees = [$employee0, $employee1, $employee2];

// Aufgabe 1: Gib alle Vornamen aus

foreach ($employees as $employee) {
  echo $employee[0] . "<br>";
}

// Aufgabe 1: Gib alle Gewichte aus

foreach ($employees as $employee) {
  echo $employee[2] . "<br>";
}

// Aufgabe 2: Gib alle Gewichte aus

$gesamtGewicht = 0;
foreach ($employees as $employee) {
  $gesamtGewicht += $employee[2];
}
echo "Gesamtgewicht = $gesamtGewicht<br>";
echo "Summe der Gewichte aller Mitarbeiter = ".array_sum(array_column($employees, 2))."<br>";

// mit for i Schleife:
$totalWeight = 0;
for($i = 0; $i < count($employees); $i++) {
  $totalWeight += $employees[$i][2];
}
echo "Total weight = $totalWeight<br>";

?>
</body>
</html>

