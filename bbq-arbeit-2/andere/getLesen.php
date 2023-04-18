<?php
echo "POST Variable<br>";

echo "<pre>";
print_r($_POST);
echo "</pre>";

echo "GET Variable<br>";

echo "<pre>";
print_r($_GET);
echo "</pre>";

// die GET Variable wird auch in der Url mitübergeben,
// als Anhang zum Pfad: ?Variablenname=Wert
// Weitere Variablen werden mit & angebunden.
// Das können wor auch bei <a href="..." benutzen

// Erstelle einen Knopf, der auf getLesen.php linkt und der folgende
// Var: vorname mit Wert Tom und Var: nachname mit Wert toll

