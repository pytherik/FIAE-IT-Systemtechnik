<?php
include 'config.php';

//info lädt Klassen, die benötigt werden automatisch nach
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});
//$a = (new Schule())->getObjectById(1);
//$b = (new Schulklasse())->getObjectById(1);
//$c = (new Schueler())->getAllAsObjects();
$d = (new Bildungstraeger())->getObjectById(1);
//$e = (new Bildungstraeger())->getObjectById(2);
echo '<pre>';
print_r($d);
//print_r($e);
//print_r($a);
//print_r($b);
//print_r($c);
echo '</pre>';
