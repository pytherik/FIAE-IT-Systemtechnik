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
// 3. schreibe eine Funktion, die Fahrenheit in Celsius umrechnet
function fahrenheitToCelsius(float $degFahrenheit): float
{
	return round(((5 / 9) * ($degFahrenheit - 32)), 2);
}

echo "99.9°F entsprechen " . fahrenheitToCelsius(99.9) . "°C.";
echo "<hr>";

?>
</body>
</html>