<?php
include 'config.php';
include 'classes/ConnectDB2.php';
include 'classes/CreateDB2.php';
include 'classes/Delivery.php';

//(new CreateDB2())->createDBwithTables();

$numDatasets = $_POST['numDatasets'] ?? '';
$numDatasets = ($numDatasets == '') ? 10 : (int)$numDatasets;

$addressData = [];
$tablename = $_POST['tablename'] ?? '';
$tablename = ($tablename == '') ? 'table' : $tablename;

if (isset($_POST['addressArray'])) {
  $houseNum = $_POST['houseNum'] ?? false;
  $addressData = (new Delivery())->getAddressData($_POST['addressArray'], $houseNum, $numDatasets);
}

if (isset($_POST['lastnames'])) {
  $lastnamesData = (new Delivery())->getLastnamesData($numDatasets);
  $addressData = array_merge([$lastnamesData], $addressData);
}

if (isset($_POST['firstnames'])) {
  $genders = explode(',', $_POST['firstnames']);
  $firstnamesData = (new Delivery())->getFirstnamesData($genders, $numDatasets);
  $addressData = array_merge([$firstnamesData], $addressData);
}

include './views/formView.php';

