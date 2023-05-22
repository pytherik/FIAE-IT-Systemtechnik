<?php

/* INTEGERS */

echo "<br/>Minimaler Integer-Wert: <b>". PHP_INT_MIN . "</b><br>";

// integers können mit Basis 10 (dezimal), 16 (hexadezimal), 8 (oktal)
// oder 2 (binär) dargestellt sein;
echo "<br>Dezimal 42: <b>" . 42 . "</b><br/>";
echo "Hexadezimal 0x2A: <b>" . 0x2A . "</b><br/>";
echo "Oktal 0O52: <b>" . 0O52 . "</b><br/>";
echo "Binär 0b101010: <b>" . 0b101010 . "</b><br/>";

// wenn durch eine Operation der Integer-Wertebereich überschritten
// wird, wird der Wert zu float gecastet
$max = PHP_INT_MAX;
echo "<br/>Maximaler Integer-Wert: <b>". $max . "</b><br>";
var_dump($max);
echo "<br/>Maximaler Integer-Wert plus 1: <b>". ++$max . "</b><br>";
var_dump($max);
echo "<br/>";
// Castings zu integer:
echo "<br/>Boolean casting: (int)true: " . (int)true . "<br/>";
echo "<br/>Boolean casting: (int)false: " . (int)false . "<br/>";
echo "<br/>Float casting: (int)5.89: " . (int)5.89 . "<br/>";
echo "<br/>String casting: (int)'42': " . (int)'42' . "<br/>";
echo "<br/>String casting: (int)'4.2': " . (int)'4.2' . "<br/>";
echo "<br/>String casting: (int)'42 = zweiundvierzig': " . (int)'42 = zweiundvierzig' . "<br/>";
echo "<br/>String casting: (int)'zweiundvierzig': " . (int)'zweiundvierzig' . "<br/>";

// große Zahlen können mit Unterstrich unterteilt werden um bessere
// Lesbarkeit zu erreichen:
$x = 2_000_000_000;
echo "<br/>2_000_000_000 = " . $x . "<br><br>";
echo "is_bool(1): " . is_bool(1) . "<br/>";
echo "is_float(1): " . is_float(1) . "<br/>";
echo "is_int(1): " . is_int(1) . "<br/>";
