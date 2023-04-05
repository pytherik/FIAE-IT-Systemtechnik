<?php

use garage\Garage;

include 'classes/Garage.php';
?>
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
$car1 = new Garage('Bully', 'weiss');
$car2 = new Garage('Ferrari', 'rot');
$car3 = new Garage('Isetta', 'pink');
$car4 = new Garage('Porsche', 'braun');

?>
</body>
</html>
