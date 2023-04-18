<?php

use musicstore\Guitar;
use musicstore\Instruments;

include 'classes/Instruments.php';
include 'classes/Guitar.php';


$git1 = new Guitar(399.99, 'Gitarre', 6, 'Mahogany', 'Rosewood');
$price = $git1->getPrice();
$family = $git1->getFamily();
$numStrings = $git1->getNumStrings();
$fretboard = $git1->getMaterialFretboard();
$corpus = $git1->getMaterialCorpus();

$git2 = new Guitar(1248.90, 'Gitarre', 7, 'Fichte', 'Mahagoni');
$price1 = $git2->getPrice();
$family1 = $git2->getFamily();
$numStrings1 = $git2->getNumStrings();
$fretboard1 = $git2->getMaterialFretboard();
$corpus1 = $git2->getMaterialCorpus();

echo "<br>Preis: $price <br> Instrument: $family<br/>Anz. Saiten: $numStrings 
<br>Griffbrett: $fretboard <br>Korpus: $corpus <br>";
echo "<br>Preis: $price1 <br> Instrument: $family1<br/>Anz. Saiten: $numStrings1 
<br>Griffbrett: $fretboard1 <br>Korpus: $corpus1 <br>";
echo "<br/>Anzahl Instrumente Total: " . Instruments::$totalInstruments;
echo "<br/><br>Anzahl Gitarren Total: " . Guitar::$totalGuitars;
