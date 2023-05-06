<?php

class Delivery extends ConnectDB2
{

  public function getAddressData(array $addressItems, bool $houseNum, int $numDatasets): array
  {
    try {
      $items = implode(',', $addressItems);
      $pdo = $this->connect();
      $result = $pdo->query("SELECT $items FROM strPlzBerlin ORDER BY RAND() LIMIT $numDatasets");
      while ($row = $result->fetch()) {
        foreach($addressItems as $index => $item){
          $addresses[$index][] = ($item == 'strasse' && $houseNum) ? $row[$item].' '.rand(1,100) : $row[$item];
        }
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    return $addresses;
  }

  public function getFirstnamesData(array $genders, int $numDatasets): array
  {
    $firstnames = [];
    try {
      $pdo = $this->connect();
      foreach ($genders as $gender) {
        $result = $pdo->query("SELECT name FROM $gender ORDER BY RAND() LIMIT $numDatasets");
        while ($row = $result->fetch()) {
          $firstnames[] = (strlen($row['name']) == 1) ? $row['name'].'.' : $row['name'];
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
    $html = "INSERT INTO $tablename VALUES \n";
    for ($j = 0; $j < $outer; $j++) {
      $html .= "\t(";
      for ($i = 0; $i < $inner; $i++) {
        $endOfLine = ($i < $inner - 1) ? "', " : "'),\n";
        if (($i == $inner - 1) && $j == ($outer - 1)) $endOfLine = "');";
        $html .= "'" . $addressArray[$i][$j] . $endOfLine;
      }
    }
    return $html;
  }
}