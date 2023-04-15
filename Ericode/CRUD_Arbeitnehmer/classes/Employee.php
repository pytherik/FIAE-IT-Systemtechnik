<?php

class Employee
{
  private int $id;
  private string $vorname;
  private string $nachname;
  private int $abteilungId;

  /**
   * @param int|null $id
   * @param string|null $vorname
   * @param string|null $nachname
   * @param int|null $abteilungId
   */
  public function __construct(int|null    $id = null, string|null $vorname = null,
                              string|null $nachname = null, int|null $abteilungId = null)
  {
    if (isset($id) && isset($vorname) && isset($nachname) && isset($abteilungId)) {
      $this->id = $id;
      $this->vorname = $vorname;
      $this->nachname = $nachname;
      $this->abteilungId = $abteilungId;
    }
  }

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getVorname(): string
  {
    return $this->vorname;
  }

  /**
   * @param string $vorname
   */
  public function setVorname(string $vorname): void
  {
    $this->vorname = $vorname;
  }

  /**
   * @return string
   */
  public function getNachname(): string
  {
    return $this->nachname;
  }

  /**
   * @param string $nachname
   */
  public function setNachname(string $nachname): void
  {
    $this->nachname = $nachname;
  }

  /**
   * @return int
   */
  public function getAbteilungId(): int
  {
    return $this->abteilungId;
  }

  /**
   * @param int $abteilungId
   */
  public function setAbteilungId(int $abteilungId): void
  {
    $this->abteilungId = $abteilungId;
  }

  /**
   * @return array
   */
  public function read(): array
  {
    $employees = [];
    $csvEmployees = explode("\n", file_get_contents(DATA_PATH));
    foreach ($csvEmployees as $line) {
      $data = explode(",", $line);
      $employees[] = new Employee($data[0], $data[1], $data[2], $data[3]);
    }
    return $employees;
  }

  public function create(int $id, string $vorname, string $nachname, int $abteilungId, bool $addNew = false): void
  {
    if (file_exists(DATA_PATH)) {
      $separator = "\n";
    } else {
      $separator = "";
    }
    $content = "$id,$vorname,$nachname,$abteilungId";
    file_put_contents(DATA_PATH, $separator . $content, FILE_APPEND);
    if ($addNew) {
      file_put_contents(PK_PATH, $id);
    }
  }

  public function getStaticId(): int
  {
    if (file_exists(PK_PATH)) {
      $id = trim(file_get_contents(PK_PATH));
      $id++;
    } else {
      $id = 0;
    }
    return $id;
  }

  public function update($id, $vorname, $nachname, $abteilungId): void
  {
    $emps = $this->read();
    unlink(DATA_PATH);
    foreach ($emps as $emp) {
      if ($emp->getId() == $id) {
        $emp->setVorname($vorname);
        $emp->setNachname($nachname);
        $emp->setAbteilungId($abteilungId);
        break;
      }
    }
    foreach ($emps as $emp) {
      $this->create($emp->getId(), $emp->getVorname(),
        $emp->getNachname(), $emp->getAbteilungId());
    }
  }

  public function delete($id): void
  {
    $emps = $this->read();
    unlink(DATA_PATH);
    foreach ($emps as $emp) {
      if (!($emp->getId() == $id)) {
        $this->create($emp->getId(), $emp->getVorname(),
          $emp->getNachname(), $emp->getAbteilungId());
      }
    }
  }

  public function validateInput($vorname, $nachname, $id): bool
  {
    if (file_exists(DATA_PATH)) {
      $emps = $this->read();
      foreach ($emps as $emp) {
        if ($emp->getVorname() == $vorname &&
          $emp->getNachname() == $nachname &&
          $emp->getId() != $id) {
          return true;
        }
      }
    }
    return false;
  }
}