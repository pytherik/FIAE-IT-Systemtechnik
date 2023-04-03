<?php

class Employee
{
  private string $firstname;
  private string $lastname;
  private int $department_id;

  /**
   * @param string $firstname
   * @param string $lastname
   * @param int $department_id
   */
  public function __construct(string $firstname, string $lastname, int $department_id)
  {
    $this->firstname = $firstname;
    $this->lastname = $lastname;
    $this->department_id = $department_id;
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
    file_put_contents('employeeData.csv',
      $this->getFirstname() .','. $this->getLastname().',' . $this->getDepartmentId()."\n",FILE_APPEND);
  }

  public function read():array
  {
    if(file_exists('employeeData.csv')) {
      $employees = [];
      $fileContents = explode("\n", file_get_contents('employeeData.'));
      foreach ($fileContents as $fileContent) {
        $employees = new Employee($fileContent[0], $fileContent[1], $fileContent[2]);
      }
    }
    return $employees;
  }
}