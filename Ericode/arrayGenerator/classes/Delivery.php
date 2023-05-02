<?php

class Delivery extends ConnectDB2
{
  public function getAddressData(array $addressItems, bool $houseNum, int $numDatasets): array
  {
    $tables = implode(',', $addressItems);
    try {
      $pdo = $this->connect();
      $result = $pdo->query("SELECT $tables FROM addresses_berlin ORDER BY RAND() LIMIT $numDatasets");
      while ($row = $result->fetch()) {
        $address = [];
        foreach ($addressItems as $item) {
          $address[] = $row[$item];
        }
        if ($houseNum) array_splice($address, 1, 0,  rand(1, 200));
        $addresssArray[] = $address;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $addresssArray;
  }

  function getFirstnamesData(array $genders, int $numDatasets): array
  {
    $firstnames = [];
    try {
      $pdo = $this->connect();
      foreach ($genders as $gender) {
        $result = $pdo->query("SELECT name FROM $gender ORDER BY RAND() LIMIT $numDatasets");
        while ($row = $result->fetch()) {
          $firstnames[] = $row['name'];
        }
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    shuffle($firstnames);
    return array_slice($firstnames, 0, $numDatasets);
  }
}



//  public function getFirstamesData(string $gender, int $numDatasets): array
//  {
//    try {
//      $pdo = $this->connect();
//      $result = $pdo->query("SELECT * FROM $gender ORDER BY RAND() LIMIT $numDatasets");
//      while ($row = $result->fetch()) {
//        $firstnames[] = $row;
//      }
//    } catch (PDOException $e) {
//      echo $e->getMessage();
//    }
//    return $firstnames;
//  }


