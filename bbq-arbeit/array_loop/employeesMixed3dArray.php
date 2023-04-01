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
    </style>
</head>
<body>
<?php
$employeeSalesVolumes = [
  [['Freya', 'Norse', 'Umsatz' => 36123], ['Niels', 'Johanson', 'Umsatz' => 23667]],
  [['Chantal', 'Chani', 'Umsatz' => 54321], ['Petrow', 'Pankow', 'Umsatz' => 45454]],
  [['Pietra', 'Pasolini', 'Umsatz' => 111222], ['Toni', 'Mahoni', 'Umsatz' => 78222]],
  [['Harrison', 'Smith', 'Umsatz' => 33333], ['Cathrin', 'Laghrey', 'Umsatz' => 23232]]
];

// Gib Vorname, Nachname und Umsatz pro Mitarbeiter aus.
// Gib den Gesamtumsatz aus.
/**
 * @param array $group
 * @return void
 */
function nameUmsatz(array $allGroups): void
{
  $gesamt = 0;
  foreach ($allGroups as $group) {
    foreach ($group as $employee) {
      $gesamt += $employee['Umsatz'];
      echo "Vorname: $employee[0]<br>";
      echo "Nachname: $employee[1]<br>";
      echo "Umsatz:" . $employee['Umsatz'] . "<hr>";
    }
  }
  echo "Gesamtumsatz: $gesamt";
}

nameUmsatz($employeeSalesVolumes);

?>
</body>
</html>


