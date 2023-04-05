<?php
use Tent\classes\Tent;
include 'classes/Tent.php';
$t = new Tent();
$t2 = new Tent();
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
echo $t->addPerson(3)."<br>";
echo $t2->addPerson(93)."<br>";
echo $t->addPerson(14)."<br>";
echo $t2->addPerson(4)."<br>";

echo $t->getTotalCounter()."<br>";
echo $t2->getTotalCounter()."<br>";
// static function von außerhalb der Klasse aufgerufen
echo Tent::$totalCounter;

?>
</body>
</html>
