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

$berlin = [7.2, 8.9, 10, 9.9];
$hamburg = [6.2, 6.3, 6.4, 6.5];
$muenchen = [2.3, 3.7, 6.6, 8.1];
$cities = ['Berlin', 'Hamburg', 'München'];
$temps = [$berlin, $hamburg, $muenchen];

function avgTemp(array $temps): float
{
  return array_sum($temps) / count($temps);
}

function avgAll(array $cities, array $temps): float
{
  $allAverages = 0;
  for ($i = 0; $i < count($cities); $i++) {
    $allAverages += avgTemp($temps[$i]);
  }
  return round($allAverages / count($cities), 2);
}

echo "Durchschnittstemperatur in:<br>";
echo "<br>";
for ($i = 0; $i < count($cities); $i++) {
  $average = avgTemp($temps[$i]);
  echo "$cities[$i]: $average<br>";
}

echo "<br>";
$averageAll = avgAll($cities, $temps);
echo "Die Durchschnittstemperatur aller Städte zusammen: " . $averageAll . "<br>";

?>

</body>
</html>