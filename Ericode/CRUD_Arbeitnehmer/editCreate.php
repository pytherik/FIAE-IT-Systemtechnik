<?php
include 'config.php';
include 'classes/Employee.php';

$edit = false; // 'false' = hinzufügen, 'true' = editieren
$dummy = new Employee();
$id = $dummy->getStaticId();
$warning = "";

$vor = "";
$nach = "";
$abt = "";

// Buttons senden 'hinzufügen', 'kill' oder 'editieren'
$action = $_GET['action'];

// wenn id mitgesendet wird entweder editieren oder löschen
if (isset($_GET['id'])) {
  if ($_GET['action'] == 'kill') {
    $dummy->delete($_GET['id']);
    header('Location:index.php');
  } else {
    $edit = true;
    $emps = $dummy->read();

    // Daten zum Vorausfüllen des Formulars
    foreach ($emps as $emp) {
      if ($emp->getId() == $_GET['id']) {
        $id = $emp->getId();
        $vor = $emp->getVorname();
        $nach = $emp->getNachname();
        $abt = $emp->getAbteilungId();
        break;
      }
    }
  }
}

// alle Felder sind ausgefüllt und Speichern Button wurde gedrückt
if (isset($_POST['save']) && isset($_POST['vorname']) &&
  isset($_POST['nachname']) && isset($_POST['abteilung'])) {
  $vorname = ucfirst($_POST['vorname']);
  $nachname = ucfirst($_POST['nachname']);
  $abteilungId = $_POST['abteilung'];
  if ($dummy->validateInput($vorname, $nachname, $id)) {
    $warning = "&nbsp;Diesen Mitarbeiter gibt es schon!&nbsp;";
  } else {
    // edit Flag, gesetzt, wenn id mitgesendet wird
    if ($edit === true) {
      $dummy->update($id, $vorname, $nachname, $abteilungId);
    } else {
      $dummy->create($id, $vorname, $nachname, $abteilungId, true);
    }
    header('Location:index.php');
  }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no,
        initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>
<div class="wrapper">
  <h1>Mitarbeiter <?= $action ?></h1>
  <a href="index.php">
    <button class="btn">Abbruch</button>
  </a>
  <form action="" method="post">
    <div class="table">
      <div class="row green">
        <div class="cell">
          ID
        </div>
        <div class="cell">
          Vorname
        </div>
        <div class="cell">
          Nachname
        </div>
        <div class="cell">
          Abteilung ID
        </div>
        <div class="cell">
          Speichern
        </div>
      </div>
      <div class="row">
        <div class="cell">
          <?= $id ?>
        </div>
        <div class="cell">
          <input type="text" name="vorname" value="<?= $vor ?>"
                 size="18" autocomplete="off" autofocus required>
        </div>
        <div class="cell">
          <input type="text" name="nachname" value="<?= $nach ?>"
                 size="18" autocomplete="off" required>
        </div>
        <div class="cell">
          <input type="number" name="abteilung" value="<?= $abt ?>"
                 min="1" max="100" autocomplete="off" required>
        </div>
        <div class="cell">
          <input class="save" type="submit" name="save" value=&#10004;>
        </div>
      </div>
    </div>
    <div class="warning">
      <span class="message"><?= $warning ?></span>
    </div>
  </form>
</body>
</html>
