<?php
include 'C:\xampp\htdocs\ebweb\FIAE-IT-Systemtechnik\helpers.php';

$mysqli = new mysqli("localhost", "erik", "321null", "test");

show($mysqli);

// Eingabe von einem Datensatz
$sql = "INSERT INTO bbq VALUES (NULL, 'Raum 106a')";
$mysqli->query($sql);

// welcher PK worde gerade vergeben?
echo '<br/>Letzter vergebener Primary Key: '. $mysqli->insert_id . '<br /><br>';

// Löschen von Datensätzen
$sql = "DELETE FROM bbq WHERE id BETWEEN 4 AND 5";
$mysqli->query($sql);

// Ändern von Datensätzen
$sql = "UPDATE bbq SET name = 'Klo' WHERE id=3";
$mysqli->query($sql);

show($mysqli);

function show($mysqli):void
{
    $sql = "SELECT  id, name FROM bbq";
    $result = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        echo $row['id'] . ' ' . $row['name'] . '<br />';
    }
}
