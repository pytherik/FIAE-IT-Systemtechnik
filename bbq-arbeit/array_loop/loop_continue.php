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
            background: #444;
            color: #ddd;
        }
    </style>
</head>
<body>
<form method="POST">
  <?php
  // in manchen amikanischen Hotels gibt es keinen 13. Stock
  // erstelle untersinander Aufzugsknöpfe, von 20 bis 0 - ohne 13 - und gib sie aus

  for ($i = 0; $i < 21; $i++) {
    $etage = 20 - $i;
    if ($etage === 13) {
      continue;
    }
    // Wenn html-tags in php so eingebetter werden kann es zu Konflikten mit Webdesignern kommen.
    // Deshalb ist es state of the art php und html voneinander getrennt zu halten.
    ?>
      <button type='radio' value=<?= $etage ?> name='etage'><?= $etage; ?></button>
      <br>
    <?php
  }

  ?>
</form>
</body>
</html>
<?php
if (isset($_POST['etage'])) {
  echo "<h1>Willst du wirklich in die " . $_POST['etage'] . " Etage?</h1>";
}
