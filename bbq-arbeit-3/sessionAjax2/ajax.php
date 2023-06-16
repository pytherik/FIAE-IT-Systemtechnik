<?php
session_start();
//todo beim ersten Aufruf geibt user seinen Namen ein,
// beim zweiten oder weitern Aufruf wird der user mit seinem Namen befgrüßt

//todo neue Aufgabe:
// wie 1.Aufgabe, aber nicht Daten per Form, sondern per ajax übergeben
if (isset ($_POST['username'])){
  $_SESSION['username'] = $_POST['username'];
  $username = $_SESSION['username'] ?? '';
  echo json_encode($username);
}


