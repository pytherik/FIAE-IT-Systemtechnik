<?php
// for-i Schleife ist genau dann gut, wenn man vorher weiß, wieviel Schleifendurchlüufe es gibt
// Aufgabe: gib alle Quadratzahlen untereinander aus, die kleiner als 1234567 sind

$squareNumber = 0;
$i = 0;
//echo $i;
while ($squareNumber < 1234567) {
  $squareNumber = $i * $i;
  echo $squareNumber;
  ?>
    <br>
  <?php
  $i++;
}
/* Schleifen und Arrays

Unterbrechung

break : Abbruch

continue : der aktuelle Durchlauf wird übersprungen

Wenn Anzahl der Scheifedurchläufe nicht gewusst ist,
ist es sinnvoll mit while Schleifen zu arbeiten -> whilelööp.pnp

- Kopfgesteuerte Scheifen for, while haben Abbruchbedingung vor Schleifendurchlauf
- Fußgesteuerte Schleifen haben Abbruchbedingung am Ende.
  - do { .... } while ( Abbruchbedingung);

