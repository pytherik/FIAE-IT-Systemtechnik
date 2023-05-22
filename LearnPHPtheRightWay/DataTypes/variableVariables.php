<?php

// definiere eine Variable
$hallo = 'welt';

// der Wert der Variablen $hallo wird zum neuen Variablennamen
$$hallo = 'hallo'; # $welt ist jetzt eine neue Variable

echo $welt . ' ' . $hallo;

echo "<br/>$hallo, $$hallo"; # das geht so nicht
echo "<br/>$hallo , {$$hallo}"; # aber so!
echo "<br/>" . $hallo . ', ' . $$hallo; # und so!