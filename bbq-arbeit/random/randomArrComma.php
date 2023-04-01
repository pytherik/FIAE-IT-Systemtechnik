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
function decRand(int $begin, int $end, float $step): float
{
  return rand($begin, $end) * $step;
}

// Aufgabe: Nimm ein w-dim Array, welches Zufallszahlen enthält
// und ersetze in allen Zellen den Punkt durch ein Komma.
/**
 * @param int $num_rows
 * @param int $num_values
 * @return array
 */
function buildArray2Dim(int $num_rows, int $num_values): array
{
  $array2Dim = [];
  for ($i = 0; $i < $num_rows; $i++) {
    for ($j = 0; $j < $num_values; $j++) {
      $array2Dim[$i][$j] = decRand(0, 100, 0.1);
    }
  }
  return $array2Dim;
}

/**
 * @param array $array2Dim
 * @return void
 */
function dot2Comma(array &$array2Dim): void
{
  for ($i = 0; $i < count($array2Dim); $i++) {
    for ($j = 0; $j < count($array2Dim[$i]); $j++) {
      $array2Dim[$i][$j] = str_replace('.', ',', $array2Dim[$i][$j]);
    }
  }
}

$dotArray = buildArray2Dim(3,3);
echo "<pre>";
print_r($dotArray);
echo "</pre>";

dot2Comma($dotArray);
echo "<pre>";
print_r($dotArray);
echo "</pre>";

///**
// * @param array $array2Dim
// * @return array
// */
//function foreach2Comma(array $array2Dim): array
//{
//    foreach($array2Dim as $outer => $dim1) {
//      foreach($dim1 as $inner => $value) {
//      $array2Dim[$outer][$inner] = str_replace('.', ',', $array2Dim[$outer][$inner]);
//    }
//  }
//  return $array2Dim;
//}

//echo "<pre>";
//print_r(foreach2Comma(buildArray2Dim(2,3)));
//echo "</pre>";

///**
// * @param int $num_rows
// * @param int $num_values
// * @return array
// */
//function buildArray2DComma(int $num_rows, int $num_values): array
//{
//  $array2Dim = [];
//  for ($i = 0; $i < $num_rows; $i++) {
//    for ($j = 0; $j < $num_values; $j++) {
//      $array2Dim[$i][$j] = str_replace('.', ',', decRand(0, 100, 0.1));
//    }
//  }
//  return $array2Dim;
//}
//
//echo "<pre>";
//print_r(buildArray2DComma(3, 3));
//echo "</pre>";
?>
</body>
</html>
