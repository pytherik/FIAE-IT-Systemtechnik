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

$b = 'abc';
$c = $b;

$b = 'def';

echo '$b = '.$b;
echo '<br>';
echo '$c = '.$c;

$d = &$b;
echo '<br>';
$b = 'ABCDE';

// $d verweist auf den Speicherplatz von $b, deshalb wird ABCDE ausgegeben
echo $d;
?>
</body>
</html>

