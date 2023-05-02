<?php
include 'config.php';
include 'classes/ConnectDB2.php';
include 'classes/CreateDB2.php';
include 'classes/Delivery.php';


$numDatasets = $_POST['numDatasets'] ?? '';
$numDatasets = ($numDatasets == '') ? 5 : (int)$numDatasets;


if (isset($_POST['addressArray'])) {
  foreach($_POST['addressArray'] as $item) {
    $items[] = $item;
  }
  $addressData = (new Delivery())->getAddressData($items, $numDatasets);
  $arrayData[] = $addressData;
  echo "<pre>";
  print_r($addressData);
  echo "</pre>";
}

if (isset($_POST['firstnames'])) {
  $firstNamesData = (new Delivery())->getMixedFirstnamesData($_POST['firstnames'], $numDatasets);
  echo "<pre>";
  print_r($firstNamesData);
  echo "</pre>";
}


include './views/formView.php';
