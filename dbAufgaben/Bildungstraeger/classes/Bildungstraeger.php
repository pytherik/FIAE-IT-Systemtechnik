<?php

class Bildungstraeger
{
  private int $id;
  private string $name;
  private array $schulen;

  /**
   * @param int|null $id
   * @param string|null $name
   */
  public function __construct(?int $id = null, ?string $name = null)
  {
    if(isset($id) && isset($name)){
      $this->id = $id;
      $this->name = $name;
    }
  }

  /**
   * @param int $id
   * @return Bildungstraeger
   * @throws Exception
   */
  public function getObjectById(int $id): Bildungstraeger
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      $sql = "SELECT * FROM bildungstraeger WHERE id = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam('id', $id, PDO::PARAM_INT);
      $stmt->execute();
      //info $employees füllen
      $bildungstraeger = $stmt->fetchObject(__CLASS__);
      $bildungstraeger->buildSchulen();
    } catch (PDOException $e) {
      throw new Exception('Datenbank sagt nein: '. $e->getMessage());
    }
    return $bildungstraeger;
  }

  /**
   * @return array|null
   */
  public function getAllAsObjects(): array|null
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      $sql = "SELECT * FROM bildungstraeger";
      $stmt = $dbh->query($sql);
      $bildungstraegers = [];
      while ($bildungstraeger = $stmt->fetchObject(__CLASS__)) {
        $bildungstraeger->buildSchulen();
        $bildungstraegers[] = $bildungstraeger;
      }
      $dbh = null;
    } catch (PDOException $e) {
      throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
    }
    return $bildungstraegers;
  }

  /**
   * @return void
   * @throws Exception
   */
  public function buildSchulen(): void
  {
    $this->schulen = (new Schule())->getAllSchulenByBildungstraeger($this);
  }

  /**
   * @return array
   */
  public function getSchulen(): array
  {
    return $this->schulen;
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
  public function getName(): string
  {
    return $this->name;
  }
}