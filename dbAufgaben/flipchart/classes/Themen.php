<?php

class Themen
{
  private int $id;
  private string $subject;

  /**
   * @param int|null $id
   * @param string|null $subject
   */
  public function __construct(?int $id = null, ?string $subject = null)
  {
    if (isset($id) && isset($subject)) {
      $this->id = $id;
      $this->subject = $subject;
    }
  }

  public function getAllAsObjects(): array
  {
    try {
      $dbh = new PDO(DB_DNS, DB_USER, DB_PASSWD);
      $sql = "SELECT * FROM thema";
      $result = $dbh->query($sql);
      $subjects = [];
      while ($row = $result->fetchObject(__CLASS__)) {
        $subjects[] = $row;
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
    return $subjects;
  }

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @return string
   */
  public function getSubject(): string
  {
    return $this->subject;
  }
}