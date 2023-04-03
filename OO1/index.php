<?php
include './classes/Bicycle.php';
include './classes/Mountainbike.php';
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

$bike1 = new Bicycle();
$bike2 = new Bicycle();


// Kapselung testen private
// echo $bike1->gear;
// Ausgabe nur möglich, wenn Variable gear in public geändert wird
$bike1->changeCadence(5);
$bike1->changeCadence(1);
$bike1->changeGear(3);
$bike1->changeGear(8);
//$bike1->printStates();

$mb = new Mountainbike();
$mb->setSuspension(true);
//echo $mb->getSuspensionStatus();
// da die Klasse Mountainbike von Bicyle erbt, kann ich alle
// Methoden von Bicycle benutzen

$mb->changeCadence(20);
$mb->callParent();
$mb->printStates();

//$bike1->changeCadence(50);
//$bike1->speedUp(10);
//$bike1->changeGear(2);
//$bike1->printStates();
//
//$bike2->changeCadence(50);
//$bike2->speedUp(10);
//$bike2->changeGear(2);
//$bike2->changeCadence(40);
//$bike2->speedUp(10);
//$bike2->changeGear(3);
//$bike2->printStates();

?>
</body>
</html>

