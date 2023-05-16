<?php

class Schule
{
    private int $id;
    private string $name;
    private int $bildungstraeger_id;
    /**
     * @var Schulklassen[]
     */
    private array $schulklassen = [];

  /**
   * @param int|null $id
   * @param string|null $name
   * @param int|null $bildungstraeger_id
   * @throws Exception
   */
    public function __construct(?int $id = null, ?string $name = null, ?int $bildungstraeger_id = null)
    {
      if (isset($id) && isset($name) && isset($bildungstraeger_id)){
        $this->id = $id;
        $this->name = $name;
        $this->bildungstraeger_id = $bildungstraeger_id;
        $this->schulklassen = (new Schulklasse())->getAllAsObjects($id);
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
      $sql = "SELECT * FROM schule WHERE id=:id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $schule = $stmt->fetchObject(__CLASS__);
      $schule->schulklassen = (new Schulklasse())->getAllAsObjects($id);
      $dbh = null;
    } catch (PDOException $e) {
      throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
    }
    return $schule;
  }

  function getAllAsObjects(int $bildungstraeger_id): array
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      $sql = "SELECT * FROM schule WHERE bildungstraeger_id= :bildungstraeger_id ";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam('bildungstraeger_id', $bildungstraeger_id);
      $stmt->execute();
      $schulen = [];
      while ($schule = $stmt->fetchObject(__CLASS__)) {
        $schule->schulklassen = (new Schulklasse())->getAllAsObjects($schule->id);
        $schulen[] = $schule;
      }
      $dbh = null;
    } catch (PDOException $e) {
      throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
    }
    return $schulen;
  }

}