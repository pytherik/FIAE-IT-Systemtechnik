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

// Wie gebe ich in einer Schleife alle Informationen des Arrays aus?
$array = [];
$array[2] = 27;
$array[4] = 13;

foreach($array as $element) {
  echo $element."<br>";
}


// $key und $value können beliebig benannt werden
foreach($array as $key=>$value) {
  echo "index $key mit wert $value<br>";
}
$employees = ['Mike', 'Ipek', 'Ferdi', 'Freya'];

// Ich kündige Ferdi. Gib alle employees danach aus.
echo "<hr>";
echo 'Mit unset($employees[2])<br>';
unset ($employees[2]);
echo "<br>";

foreach ($employees as $index => $employee) {
  echo "index: $index, Name: $employee<br>";
}

$employees = ['Mike', 'Ipek', 'Ferdi', 'Freya'];

echo "<hr>";
echo 'Mit der array function array_diff($employees, array("Ferdi"))<br>';
$employees = array_diff($employees,array('Ferdi'));
echo "<br>";

foreach ($employees as $index => $employee) {
  echo "index: $index, Name: $employee<br>";
}
?>
</body>
</html>

