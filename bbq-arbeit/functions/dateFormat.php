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
// schreibe eine Funktion, die ein deutsches Datum in das SQL Format überführt
/**
 * @param string $germanDate
 * @return string
 * $germaDate punktseparates Datum DD.MM.YYYY
 */
function german2SQLDateformat(string $germanDate): string
{
  return implode('-',(array_reverse(explode('.', $germanDate))));
}

/**
 * @param string $sqlDate (YYYY-MM-DD)
 * @return string
 */
function sql2germanDateformat(string $sqlDate): string
{
  return implode('.',(array_reverse(explode('-', $sqlDate))));
}

$date1 = german2SQLDateformat('29.3.2023');
echo "$date1<br>";

$date2 = sql2germanDateformat($date1);
echo "$date2<br>";

?>

</body>
</html>

