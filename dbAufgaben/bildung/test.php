<?php
include 'config.php';

//info lädt Klassen, die benötigt werden automatisch nach
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});

$b = (new Bildungstraeger())->getObjectById(2);

echo '<pre>';
print_r($b);
echo '</pre>';