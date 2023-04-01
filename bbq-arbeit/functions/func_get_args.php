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

// wie schreibe ich eine Funktion, die eine beliebige Anzahl von float-Werten
// annimmt, um deren Summe auszugeben?
function foo(): int
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

echo foo(1, 2, 3) . "<br>";
function bar(...$args): int
{
	$summe = 0;
	foreach ($args as $arg) {
		$summe += $arg;
	}
	return $summe;
}

echo bar(1, 4, 6) . "<br>";

function sumAny():int {
    return array_sum(func_get_args());
}

echo "sumAny (func_get_args()) Funktion) = ".sumAny(1, 2, 3, 2, 1);
?>

</body>
</html>
