<?php

class Employee
{
  private string $firstname;
  private string $lastname;
  private int $department_id;

  /**
   * @param string | null $firstname
   * @param string | null $lastname
   * @param int | null $department_id
   */
  public function __construct(string|null $firstname = null, string|null $lastname = null, int|null $department_id = null)
  {
    if (isset($firstname) && isset($lastname) && isset($department_id)) {
      $this->firstname = $firstname;
      $this->lastname = $lastname;
      $this->department_id = $department_id;
    }
  }

  /**
   * @return string
   */
  public function getFirstname(): string
  {
    return $this->firstname;
  }

  /**
   * @param string $firstname
   */
  public function setFirstname(string $firstname): void
  {
    $this->firstname = $firstname;
  }

  /**
   * @return string
   */
  public function getLastname(): string
  {
    return $this->lastname;
  }

  /**
   * @param string $lastname
   */
  public function setLastname(string $lastname): void
  {
    $this->lastname = $lastname;
  }

  /**
   * @return int
   */
  public function getDepartmentId(): int
  {
    return $this->department_id;
  }

  /**
   * @param int $department_id
   */
  public function setDepartmentId(int $department_id): void
  {
    $this->department_id = $department_id;
  }
  // Benötigte Methoden für CRUD
  // store, read, update, delete
  // Wie können wir die Daten eines employees in einer Datei speichern?

  public function store(): void
  {
//    echo filesize('employeeData.csv');
    if (file_exists('employeeData.csv') &&
      !(trim(file_get_contents('employeeData.csv')) == false)) {
      $separator = "\n";
    } else {
      $separator = "";
    }
    file_put_contents('employeeData.csv',
      $separator . $this->firstname . ',' . $this->lastname . ',' .
      $this->department_id, FILE_APPEND);
  }

  public function read(): array
  {
    $employees = [];
    if (file_exists('employeeData.csv')) {
      $fileContents = explode("\n", file_get_contents('employeeData.csv'));
      foreach ($fileContents as $line) {
        $employeeArray = explode(',', $line);
        $employees[] = new Employee($employeeArray[0], $employeeArray[1], $employeeArray[2]);
      }
    }
    return $employees;
  }

  public function delete(): array
  {
    $employees = $this->read();
    unlink('employeeData.csv');
    foreach($employees as $employee){
      if ($employee != $this){
        $employee->store();
        echo "<pre>";
        print_r($employee);
        echo "</pre>";
      }
    }
    return $this->read();
  }
}
//  public function delete(): void
//  {
//    $index = 0;
//    $employees = $this->read();
//    foreach ($employees as $index => $employee) {
//      if ($this == $employee) {
//        echo "index: $index<br>";
//        break;
//      }
//    }
//    array_splice($employees, $index, 1);
//    // löschen von employeeData.csv
//    unlink('employeeData.csv');
//    foreach ($employees as $employee) {
//      $employee->store();
//    }
//  }




// etwas unelegantere store methode
//
//  public function store(): void
//  {
//    $content = implode(',', [$this->getFirstname(), $this->getLastname(), $this->getDepartmentId()]);
//
//    if (file_exists('employeeData.csv')) {
//      file_put_contents('employeeData.csv', "\n" . $content, FILE_APPEND);
//    } else {
//      file_put_contents('employeeData.csv', $content);
//    }
//  }
