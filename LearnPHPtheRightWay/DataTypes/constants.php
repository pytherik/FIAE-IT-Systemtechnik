<?php

// definiert zur compile time
const CONST2 = 'const 2';

// definiert zur Laufzeit (runtime), wird in Kontroll-Strukturen benutzt
if (CONST2) {
  # const CONST1 = 'const 1'  funktioniert hier nicht!!
  define('CONST1', 'const 1');
}


echo "<br/>Konstante 1: " . CONST1 . "<br/>Konstante 2: " . CONST2 . "<br/>";

// eine einmal definierte Konstante kann nicht mehr verändert werden
# CONST2 = 'etwas anderes'; geht nicht!
# unset(CONST1);            geht auch nicht!

// Bool-Wert zum Check ob Konstante definiert ist

// gibt 1 aus Konstante ist definiert
echo "<br/>Status Konstante 1: " . defined('CONST1');

// gibt 1 aus auch wenn sie nicht mit define definiert wurde
echo "<br/>Status Konstante 2: " . defined('CONST2');

// nicht definiert (gibt gar nichts aus)
echo "<br/>Status Konstante 3: " . defined('SONST1');

// dynamische Definition von Konstanten:

$okay = 'OKAY';
$mies = 'MIES';
define('STATUS_' . $okay, $okay); // hier muss mit Punkt konkateniert
//                                  werden, da Parameter erwartet werden
define('WETTER_' . $mies, 'mies');
# NOGO: const WETTER_ . $mies, 'mies';

echo "<br/>" . STATUS_OKAY;
echo "<br/>" . WETTER_MIES;