<?php

class Schulklasse
{
  private int $id;
  private string $name;
  private int $schule_id;
  private array $schueler;

  public function __construct(?int $id = null, ?string $name = null, ?int $schule_id = null)
  {
    if(isset($id) && isset($name)){
      $this->id = $id;
      $this->name = $name;
    }
  }

  /**
   * @param int $id
   * @return Schulklasse
   * @throws Exception
   */
  public function getObjectById(int $id): Schulklasse
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      $sql = "SELECT * FROM schulklasse WHERE id = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam('id', $id, PDO::PARAM_INT);
      $stmt->execute();
      //info $employees füllen
      $schulklasse = $stmt->fetchObject(__CLASS__);
      $schulklasse->buildEmployees();
    } catch (PDOException $e) {
      throw new Exception('Datenbank sagt nein: '. $e->getMessage());
    }
    return $schulklasse;
  }

  /**
   * @param Schule|null $schule
   * @return array|null
   * @throws Exception
   */
  public function getAllAsObjects(Schule $schule = null): array|null
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      if (!isset($schule)) {
        $sql = 'SELECT * from schulklasse';
        $result = $dbh->query($sql);
      } else {
        $sql = "SELECT * from schulklasse WHERE schule_id = :schule_id";
        $stmt = $dbh->prepare($sql);
        $id = $schule->getId();
        $stmt->bindParam('schule_id', $id);
        $stmt->execute();
        $result = $stmt; //info technisch zum Abfragen der while-Schleife
      }
      $schulklassen = [];
      while ($schulklasse = $result->fetchObject(__CLASS__)) {
        $schulklasse->buildSchueler();
        $schulklassen[] = $schulklasse;
      }
      $dbh = null;
    } catch (PDOException $e) {
      throw new Exception($e->getMessage() . ' ' . implode('-', $e->getTrace()) . ' ' . $e->getCode() . ' ' . $e->getLine());
    }
    return $schulklassen;
  }

  /**
   * @return void
   * @throws Exception
   */
  public function buildSchueler(): void
  {
    $this->schueler = (new Schueler())->getAllSchuelerBySchulklasse($this);
  }

  /**
   * @return array
   */
  public function getSchueler(): array
  {
    return $this->schueler;
  }

  /**
   * @param Schule $schule
   * @return array|null
   * @throws Exception
   */
  public function getAllSchulklassenBySchule(Schule $schule): array|null
  {
    return $this->getAllAsObjects($schule);
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