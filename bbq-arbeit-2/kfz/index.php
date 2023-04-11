<?php
include 'classes/Kfz.php';
include 'classes/Lkw.php';

$l = new \kfz\classes\Lkw(123, 12.32, 40);
echo $l->getKfzscheinnummer()."<br>";
echo $l->getLadevolumen()."<br>";
echo $l->getLeistung()."<br>";