<?php

class Delivery extends ConnectDB2
{
  public function getAddressData(array $addressItems, bool $houseNum, int $numDatasets): array
  {
    try {
      $pdo = $this->connect();
      foreach ($addressItems as $item) {
        $result = $pdo->query("SELECT $item FROM addresses_berlin ORDER BY RAND() LIMIT $numDatasets");
        $part = [];
        while ($row = $result->fetch()) {
          if ($item == 'strasse' && $houseNum) {
            $part[] = $row[$item] . ' ' . (rand(1, 100));
          } else {
            $part[] = $row[$item];
          }
        }
        $address[] = $part;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $address;
  }

  public function getFirstnamesData(array $genders, int $numDatasets): array
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

  public function getLastnamesData(int $numDatasets): array
  {
    $lastnames = [];
    try {
      $pdo = $this->connect();
      $result = $pdo->query("SELECT name FROM surnames ORDER BY RAND() LIMIT $numDatasets");
      while ($row = $result->fetch()) {
        $lastnames[] = $row['name'];
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $lastnames;
  }

  public function createQueryTemplate(array $addressArray, string $tablename = 'table'): string
  {
    $inner = count($addressArray);
    $outer = count($addressArray[0]);
    $html = "INSERT INTO $tablename VALUES <br><blockquote>";
    for ($j = 0; $j < $outer; $j++) {
      $html .= "(";
      for ($i = 0; $i < $inner; $i++) {
        $endOfLine = ($i < $inner - 1) ? "', " : "'),<br/>";
        if (($i == $inner - 1) && $j == ($outer - 1)) $endOfLine = "');</blockquote>";
        $html .= "'" . $addressArray[$i][$j] . $endOfLine;
      }
      $i = 0;
    }
    return $html;
  }
}
