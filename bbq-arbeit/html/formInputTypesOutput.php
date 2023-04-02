<!doctype html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=">
  <link rel="stylesheet" href="../public/css/root.css">
  <link rel="stylesheet" href="../public/css/style.css">
  <title>pampeldoc</title>
</head>
<body>
<?php
if (isset($_POST['vorname']) && isset($_POST['nachname']) &&
  isset($_POST['geschlecht']) && isset($_POST['sprache'])) {
  $vorname = $_POST['vorname'];
  $nachname = $_POST['nachname'];
  $geschlecht = $_POST['geschlecht'];
  $sprachen = $_POST['sprache'];
  $autos = $_POST['auto'];
  $comment = $_POST['comment'];
  $email = $_POST['email'];
  ?>
    <h3>Vorame: <?= $vorname; ?></h3>
    <h3>Nachname: <?= $nachname; ?></h3>
    <h3>Email: <?= $email ?></h3>
    <h3>Geschlecht: <?= $geschlecht; ?></h3>
    <h3>Sprachen: </h3>
    <ul>
      <?php foreach ($sprachen as $sprache) { ?>
          <li><?= $sprache ?></li>
      <?php } ?>
    </ul>
  <h3>Eiskugeln</h3>
  <ul>
    <?php
    foreach ($autos as $auto) {
      ?>
      <li><?= $auto ?></li>
      <?php
    }
    ?>
  </ul>
  <?php
}
?>
<h3>Kommentar</h3>
<p><?= $comment ?></p>
</body>
</html>
