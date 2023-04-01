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

$array = [];
$array[2] = 27; // Wie gebe ich in einer Schleife alle Informationen des Arrays aus?
$array[4] = 13;

foreach($array as $element) {
  echo $element."<br>";
}

foreach($array as $key=>$value) { // $key und $value können beliebig benannt werden
  echo "index $key mit wert $value<br>";
}

$employees = ['Mike', 'Ipek', 'Ferdi', 'Freya'];
// ich kündige Ferdi. Gib alle employees danach aus

//unset ($employees[2]);
$employees = array_diff($employees,array('Ferdi'));

foreach ($employees as $employee) {
  echo $employee."<br>";
}
?>
</body>
</html>

