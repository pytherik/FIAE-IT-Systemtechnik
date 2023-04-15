<?php

class Employees
{
  private string $firstname;
  private string $lastname;
  private int $department_id;

  /**
   * @param string|null $firstname
   * @param string|null $lastname
   * @param int|null $department_id
   */
  public function __construct(?string $firstname = null, ?string $lastname = null, ?int $department_id = null)
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
//    echo filesize(PATH_DATA);
    if (file_exists(PATH_DATA) &&
      !(trim(file_get_contents(PATH_DATA)) == false)) {
      $separator = "\n";
    } else {
      $separator = "";
    }
    file_put_contents(PATH_DATA,
      $separator . $this->firstname . ',' . $this->lastname . ',' .
      $this->department_id, FILE_APPEND);
  }

  /**
   * @return Employees[]
   */
  public function read(): array
  {
    $employees = [];
    if (file_exists(PATH_DATA)) {
      $fileContents = explode("\n", file_get_contents(PATH_DATA));
      foreach ($fileContents as $line) {
        $employeeArray = explode(',', $line);
        $employees[] = new Employees($employeeArray[0], $employeeArray[1], $employeeArray[2]);
      }
    }
    return $employees;
  }

  public function delete(): array
  {
    $employees = $this->read();
    unlink(PATH_DATA);
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


  public function update(string $action, string $newValue): void
  {
    $employees = $this->read();
    foreach ($employees as $employee) {
      if ($this == $employee){
        if ($action == 'firstname') {
          $employee->setFirstname($newValue);
        } else if ($action == 'lastname') {
          $employee->setLastname($newValue);
        } else if ($action === 'id') {
          $employee->setDepartmentId($newValue);
        }
      break;
      }
    }
    unlink(PATH_DATA);
    foreach ($employees as $employee) {
      $employee->store();
    }
  }
//  public function update(int $index, array $attributeValue): void
//  {
//    $employees = $this->read();
//    if (key_exists('firstname', $attributeValue)) {
//      $employees[$index]->setFirstname($attributeValue['firstname']);
//    } else if (key_exists('lastname', $attributeValue)) {
//      $employees[$index]->setLastname($attributeValue['lastname']);
//    } else if (key_exists('id', $attributeValue)) {
//      $employees[$index]->setDepartmentId($attributeValue['id']);
//    }
//
//    unlink(PATH_DATA);
//    foreach ($employees as $employee) {
//      $employee->store();
//    }
//  }
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
//    unlink(PATH_DATA);
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
//    if (file_exists(PATH_DATA)) {
//      file_put_contents(PATH_DATA, "\n" . $content, FILE_APPEND);
//    } else {
//      file_put_contents(PATH_DATA, $content);
//    }
//  }
