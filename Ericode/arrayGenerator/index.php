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
  foreach ($_POST['addressArray'] as $item) {
    $items[] = $item;
  }
  $houseNum = $_POST['houseNum'] ?? false;
  $addressData = (new Delivery())->getAddressData($items, $houseNum, $numDatasets);
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

if(isset($_POST['addressArray']) || isset($_POST['firstnames']) || isset($_POST['lastnames'])){
  echo "<br/><hr><br>";
echo (new Delivery())->createQueryTemplate($addressData, $tablename);
}
