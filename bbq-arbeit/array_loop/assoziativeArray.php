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
            font-size: 1.4rem;
        }
    </style>
</head>
<body>

<?php
$employee0 = ['Anna', 'Angst', 80];
$employee1 = ['Ipek', 'Arlsan', 45];
$employee2 = ['Peter', 'Panne', 88];

// Der Index ist nichtssagend, da er nur eine Zahl ist.
// Schöner ist:

$employees = [];
$employees[0] = ['vorname' => 'Anna', 'nachname' => 'Angst', 'gewicht' => 80];
$employees[1] = ['vorname' => 'Ipek', 'nachname' => 'Arlsan', 'gewicht' => 45];
$employees[2] = ['vorname' => 'Peter', 'nachname' => 'Panne', 'gewicht' => 88];

// ein assoziatives Array hat als Schlüssel einen String, der eine Bedeutung assoziiert
$gesamtGewicht = 0;
foreach ($employees as $employee) {
  $gesamtGewicht += $employee['gewicht'];
}

echo "Gesamtgewicht: $gesamtGewicht<br>";

echo "<br>";

// Aufgabe:
foreach ($employees as $employee) {
  foreach ($employee as $key => $value) {
    echo "$key => $value<br>";
  }
  echo "<br>";
}
?>
</body>
</html>

