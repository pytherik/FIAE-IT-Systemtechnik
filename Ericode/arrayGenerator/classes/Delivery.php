<?php

class Delivery extends ConnectDB2
{
  public function getAddressData(array $items, int $numDatasets): array
  {
    $tables = implode(',', $items);
    try {
      $pdo = $this->connect();
      $result = $pdo->query("SELECT $tables FROM addresses_berlin ORDER BY RAND() LIMIT $numDatasets");
      while ($row = $result->fetch()) {
        $addresssArray[] = $row;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $addresssArray;
  }

  public function getFirstamesData(string $gender, int $numDatasets): array
  {
    try {
      $pdo = $this->connect();
      $result = $pdo->query("SELECT * FROM $gender ORDER BY RAND() LIMIT $numDatasets");
      while ($row = $result->fetch()) {
        $firstnames[] = $row;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $firstnames;
  }

  function getMixedFirstnamesData(array $genders, int $numDatasets): array
  {
    try {
      $pdo = $this->connect();
      $result = $pdo->query(
        "SELECT 
    (SELECT name FROM $genders[0] ORDER BY RAND()), 
       (SELECT name FROM $genders[1] ORDER BY RAND()) LIMIT $numDatasets");
      while ($row = $result->fetch()) {
        $firstnames[] = $row;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $firstnames;
  }
}

