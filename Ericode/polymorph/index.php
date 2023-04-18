<?php

//include 'classes/Orchestra.php';
include 'classes/Violins.php';
include 'classes/Brass.php';
include 'classes/Woodwind.php';
include 'classes/Drums.php';

$violin = new Violins();
$wood = new Woodwind();
$trumpet = new Brass();
$timbal = new Drums();

$ensemble = [$violin, $wood, $trumpet, $timbal];

function playing($ensemble):void
{
  foreach ($ensemble as $member) {
    echo $member->play() . "<br>";
  }
}

playing($ensemble);