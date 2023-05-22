<?php

echo date_default_timezone_get()."<br/>";
echo date('M d, Y')."<br/>";

date_default_timezone_set("Europe/Berlin");
/* UNIX timestamp: (time in seconds since 01.01.1970 0:00 - epoch)*/
//echo time() . "<br/>";

$currentTime = time();

// 5 Tage weiter:
// + Tage * Stunden * Minuter * Sekunden
$fiveDaysLater = $currentTime + 5 * 24 * 60 * 60 . "<br/>";

echo date_default_timezone_get()."<br/>";
echo date('d.m.Y G:i:s')."<br/>";
//echo date('d.m.Y G:i:s', $fiveDaysLater)."<br/>";
echo date('d.m.Y G:i:s', mktime(10, 24, 33, 6, 29, null))."<br/>";
$birthday = date('d.m.Y G:i:s', mktime(0, 0, 0, 6, 29, null));
echo $birthday . "<br/>";

echo date('d.m.Y', strtotime('last day of june 2023'));

echo "<pre>";
print_r(date_parse($birthday));
// gibt auch Fehler mit aus
print_r(date_parse_from_format('m.d.y G:i:s', $birthday));
echo "</pre>";