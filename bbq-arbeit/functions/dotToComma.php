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
$number = 2.3;
// Schreibe eine Funktion, die den Punkt durch ein Komma ersetzt
function dotToComma(float &$dot):string {
    $dot++;
  return str_replace('.', ',',(string)$dot);
}
function dotToComma2(string $dot):string {
    return implode(',', explode('.',$dot));
}
echo dotToComma($number)."<br>";
echo dotToComma2("z.B. 2.3")."<br>";
echo $number;
?>
</body>
</html>

