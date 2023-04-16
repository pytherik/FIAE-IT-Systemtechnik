<?php
include 'classes/ConnectDB.php';
include 'classes/Mitarbeiter.php';

$dummy = new Mitarbeiter();

if(!($dummy->tableExists('employees'))) {
  $dummy->createTable('employees');
 header('Location:editCreate.php');
} else {
  $emps = $dummy->getAllEmployees();
  if($emps == []){
    header('Location:editCreate.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSS Responsive Table Layout</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="wrapper">
    <h1>Mitarbeiter Liste</h1>
    <a href="editCreate.php?action=hinzufügen">
        <button class="btn">MA hinzufügen</button>
    </a>
    <div class="table">
        <div class="row header">
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
                Löschen
            </div>
            <div class="cell">
                Ändern
            </div>
        </div>
        <?php
        foreach ($emps as $emp) {
        ?>
        <div class="row">
            <div class="cell">
              <?= $emp['id'] ?>
            </div>
            <div class="cell">
              <?= $emp['vorname'] ?>
            </div>
            <div class="cell">
              <?= $emp['nachname'] ?>
            </div>
            <div class="cell">
              <?= $emp['abteilungId'] ?>
            </div>
            <div class="cell">
                <form action="editCreate.php?id=<?= $emp['id'] ?>&action=kill" method="POST">
                    <input class="delete" type="submit" name="kill" value=&#10006;>
                </form>
            </div>
            <div class="cell">
                <form action="editCreate.php?id=<?= $emp['id'] ?>&action=editieren" method="POST">
                    <input type="submit" value=&#10000;>
                </form>
            </div>
        </div>
        <?php
        }
        ?>
</div>
</body>
</html>