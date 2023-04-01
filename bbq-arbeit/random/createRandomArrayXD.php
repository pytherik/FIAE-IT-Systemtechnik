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
/**
 * @param int $begin
 * @param int $end
 * @param float $step
 * @return float
 */
function decRand(int $begin, int $end, float $step):float {
  return rand($begin, $end) * $step;
}

//echo decRand(0, 100, 0.1);

// Erstelle eine Funktion, die ein Array $x mal $y erstellt mit Zufallszahlen von 0.0 bis 10.0
/**
 * @param int $num_rows
 * @param int $num_values
 * @return array
 */
function randArray(int $num_rows, int $num_values):array {
    $resArray = [];
    for($i = 0; $i < $num_rows; $i++) {
       $inner = [];
       for ($j = 0; $j < $num_values; $j++) {
           $inner[] = decRand(0, 100, 0.1);
       }
       $resArray[] = $inner;
    }
    return $resArray;
}

$randomArray = randArray(2, 3);
echo "randArray:<br>";
echo "<pre>";
print_r($randomArray);
echo "</pre>";


// Musterlösung
/**
 * @param int $num_rows
 * @param int $num_values
 * @return array
 */
function randArray2(int $num_rows, int $num_values):array {
    $resArray = [];
    for($i = 0; $i < $num_rows; $i++) {
       for ($j = 0; $j < $num_values; $j++) {
         $resArray[$i][$j] = decRand(0, 100, 0.1);
       }
    }
    return $resArray;
}

$randomArray2 = randArray2(2, 3);
echo "randArray2:<br>";
echo "<pre>";
print_r($randomArray2);
echo "</pre>";

/**
 * @param int $num_rows
 * @param int $num_values
 * @param int $depth
 * @return array
 */
function randArray3D(int $num_rows, int $num_values, int $depth):array {
  $resArray = [];

  for($i = 0; $i < $depth; $i++) {
    for ($j = 0; $j < $num_rows; $j++) {
      for ($k = 0; $k < $num_values; $k++) {
        $resArray[$i][$j][$k] = decRand(0, 100, 0.1);
      }
    }
  }
  return $resArray;
}

$randomArray3D = randArray3D(2, 3, 3);
echo "randArray3D:<br>";
echo "<pre>";
print_r($randomArray3D);
echo "</pre>";

// alle Werte random generiert bis auf die Ausdehnung rows (x), cols (y)
/**
 * @param int $max_rows
 * @param int $max_values
 * @return array
 */

function randArrayXL(int $max_rows, int $max_values):array {
	$resArray = [];
	$rows = rand(1, $max_rows);
	for($i = 0; $i < $rows; $i++) {
		$values = rand(1, $max_values);
		for ($j = 0; $j < $values; $j++) {
			$resArray[$i][$j] = decRand(0, 100, 0.1);
		}
	}
	return $resArray;
}

$XLrandArray = randArrayXL(rand(1,12), rand(1,12));

echo "<pre>";
print_r($XLrandArray);
echo "</pre>";
?>

</body>
</html>
