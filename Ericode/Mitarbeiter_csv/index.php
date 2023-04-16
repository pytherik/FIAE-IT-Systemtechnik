<?php
include ('config.php');
include ('classes/Employee.php');

$dummy = new Employee();

// noch keine Daten verfügbar: nach editCreate weiterleiten
if (!file_exists(DATA_PATH)) {
    header('Location:editCreate.php');
} else {
    $emps = $dummy->read();
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
                <?php echo $emp->getId() ?>
            </div>
            <div class="cell">
                <?php echo $emp->getVorname() ?>
            </div>
            <div class="cell">
                <?php echo $emp->getNachname() ?>
            </div>
            <div class="cell">
                <?php echo $emp->getAbteilungId() ?>
            </div>
            <div class="cell">
                <form action="editCreate.php?id=<?php echo $emp->getId()?>&action=kill" method="POST">
                    <input class="delete" type="submit" name="kill" value=&#10006;>
                </form>
            </div>
            <div class="cell">
                <form action="editCreate.php?id=<?php echo $emp->getId()?>&action=editieren" method="POST">
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