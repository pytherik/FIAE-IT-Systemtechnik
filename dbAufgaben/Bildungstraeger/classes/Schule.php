<?php

class Schule
{
  private int $id;
  private string $name;
  private array $schulklassen;
  private int $bildungstraeger_id;

  /**
   * @param int|null $id
   * @param string|null $name
   * @param int|null $bildungstraeger_id
   */
  public function __construct(?int $id = null, ?string $name = null, ?int $bildungstraeger_id = null)
  {
    if (isset($id) && isset($name)) {
      $this->id = $id;
      $this->name = $name;
    }
  }

  /**
   * @param int $id
   * @return Schule
   * @throws Exception
   */
  public function getObjectById(int $id): Schule
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      $sql = "SELECT * FROM schule WHERE id = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam('id', $id, PDO::PARAM_INT);
      $stmt->execute();
      //info $employees füllen
      $schule = $stmt->fetchObject(__CLASS__);
      $schule->builSchulklassen();
    } catch (PDOException $e) {
      throw new Exception('Datenbank sagt nein: ' . $e->getMessage());
    }
    return $schule;
  }

  /**
   * @param Bildungstraeger|null $bildungstraeger
   * @return array|null
   * @throws Exception
   */
  public function getAllAsObjects(Bildungstraeger $bildungstraeger = null): array|null
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      if (!isset($bildungstraeger)) {
        $sql = 'SELECT * from schule';
        $result = $dbh->query($sql);
      } else {
        $sql = "SELECT * from schule WHERE bildungstraeger_id = :bildungstraeger_id";
        $stmt = $dbh->prepare($sql);
        $id = $bildungstraeger->getId();
        $stmt->bindParam('bildungstraeger_id', $id);
        $stmt->execute();
        $result = $stmt;
      }
      $schulen = [];
      while ($schule = $result->fetchObject(__CLASS__)) {
        $schule->buildSchulklassen();
        $schulen[] = $schule;
      }
      $dbh = null;
    } catch (PDOException $e) {
      throw new Exception($e->getMessage() . ' ' . implode('-', $e->getTrace()) . ' ' . $e->getCode() . ' ' . $e->getLine());
    }
    return $schulen;
  }


  /**
   * @return void
   * @throws Exception
   */
  public function buildSchulklassen(): void
  {
    $this->schulklassen = (new Schulklasse())->getAllSchulklassenBySchule($this);
  }

  /**
   * @param Bildungstraeger $bildungstraeger
   * @return array|null
   * @throws Exception
   */
  public function getAllSchulenByBildungstraeger(Bildungstraeger $bildungstraeger): array|null
  {
    return $this->getAllAsObjects($bildungstraeger);
  }

  /**
   * @return array
   */
  public function getSchulklassen(): array
  {
    return $this->schulklassen;
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