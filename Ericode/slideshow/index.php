<?php
require_once 'classes/Database.php';
include 'templates/header.php';

$collectFolders = scandir('./public/dirt');

foreach ($collectFolders as $folder) {
  if (!str_starts_with('..', $folder)) {
    $pictureLocations[] = "./public/dirt/$folder/";
  }
}

$pdo = new Database();

//$pdo->createDB($pictureLocations);

$num = $_SESSION['numPics'];

$result = $pdo->getNumRandomPics($num);
$index = 0;
if ($num > 2) {
  include 'templates/morePics.php';
} else {
  include 'templates/twoPics.php';
}

include 'templates/footer.php';

