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
// Schreibe eine Funktion, die die Summe zweier Zahlen ausgibt


function summe2(float $number1, float $number2):float {
  return $number1 + $number2;
}
echo "Funktion summe2: ".summe2(2.4, 5.6)."<br>";

function summe3(float $number1, float $number2, float $number3):float {
  return $number1 + $number2 + $number3;
}
echo "Funktion summe3: ".summe3(2.4, 5.6, 2)."<br>";
function addAny(float $number1, float $number2, float $number3 = null):float {
  return $number1 + $number2 + $number3;
}
echo "Funktion addAny mit 3 Werten: ".addAny(3.4, 5.6, 2)."<br>";
echo "Funktion addAny mit 2 Werten: ".addAny(3.4, 5.6)."<br>";

// '= null' wird bei Parametern von hinten aufgefüllt für optionale Parameter
// nicht null Werte müssen zwingend beim Aufruf übergeben werden

// in anderen Programmiersprachen heisst eine Funktion, die verschieden viele oder verschiedne Datentypen
// erwartet 'überladen'.

// wie schreibe ich eine Funktion, die eine beliebige Anzahl von float-Werten
// annimmt, um deren Summe auszugeben?
function anySum(): int
{
  $numargs = func_num_args();
  echo "Anzahl der Argumente: $numargs <br>";
  if ($numargs >= 2) {
    echo "Das zweite Argument ist: " . func_get_arg(1) . "<br>";
  }
  $summe = 0;
  $arg_list = func_get_args();
  for ($i = 0; $i < $numargs; $i++) {
    echo "Argument $i ist: " . $arg_list[$i] . "<br>";
    $summe += $arg_list[$i];
  }
  return $summe;
}

echo anySum(1, 2, 3)."<br>";

function anySum2(...$args):int
{
	$summe = 0;
	foreach ($args as $arg) {
		$summe += $arg;
	}
	return $summe;
}

echo anySum2(1,4,6)."<br>";

?>
</body>
</html>
