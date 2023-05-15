<?php

class Schueler
{
  private int $id;
  private string $vorname;
  private string $nachname;
  private int $schulklasse_id;

  /**
   * @param int|null $id
   * @param string|null $vorname
   * @param int|null $nachname
   * @param int|null $schulklasse_id
   */
  public function __construct(?int $id = null, ?string $vorname = null, ?int $nachname = null, ?int $schulklasse_id = null)
  {
    if(isset($id) && isset($vorname) && isset($nachname) && isset($schulklasse_id)){
      $this->id = $id;
      $this->vorname = $vorname;
      $this->nachname = $nachname;
    }
  }

  /**
   * @param int $id
   * @return Schueler
   * @throws Exception
   */
  public function getObjectById(int $id): Schueler
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      $sql = "SELECT * FROM schueler WHERE id = :id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam('id', $id, PDO::PARAM_INT);
      $stmt->execute();
      //info $employees füllen
      $schueler = $stmt->fetchObject(__CLASS__);
    } catch (PDOException $e) {
      throw new Exception('Datenbank sagt nein: '. $e->getMessage());
    }
    return $schueler;
  }

  /**
   * @param Schulklasse|null $schulklasse
   * @return array|null
   * @throws Exception
   */
  public function getAllAsObjects(Schulklasse $schulklasse = null): array|null
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      if (!isset($schulklasse)) {
        $sql = 'SELECT * from schueler';
        $result = $dbh->query($sql);
      } else {
        $sql = "SELECT * from schueler WHERE schulklasse_id = :schulklasse_id";
        $stmt = $dbh->prepare($sql);
        $id = $schulklasse->getId();
        $stmt->bindParam('schulklasse_id', $id);
        $stmt->execute();
        $result = $stmt; //info technisch zum Abfragen der while-Schleife
      }
      $schuelers = [];
      while ($row = $result->fetchObject(__CLASS__)) {
        $schuelers[] = $row;
      }
      $dbh = null;
    } catch (PDOException $e) {
      throw new Exception($e->getMessage() . ' ' . implode('-', $e->getTrace()) . ' ' . $e->getCode() . ' ' . $e->getLine());
    }
    return $schuelers;
  }

  /**
   * @param Schulklasse $schulklasse
   * @return array|null
   * @throws Exception
   */
   public function getAllSchuelerBySchulklasse(Schulklasse $schulklasse): array|null
  {
    return $this->getAllAsObjects($schulklasse);
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
  public function getVorname(): string
  {
    return $this->vorname;
  }

  /**
   * @return string
   */
  public function getNachname(): string
  {
    return $this->nachname;
  }
}