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
// Array Funktionen

$a = [5, 4, 3];
$b = [2, 1];
$c = array_merge($a, $b);
$deutschesDatum = '28.03.2023'; // Umwandeln in SQL-Format
$date = explode('.', $deutschesDatum);
$date = array_reverse($date);
$date = implode('-', $date);
echo "Date = $date"."<br>";

// verrückte Scheisse

$date2 = implode('-',array_reverse(explode('.', $deutschesDatum)));
echo "Date 2 = $date2";
?>

</body>
</html>

