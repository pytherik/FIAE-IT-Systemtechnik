<?php

class Schulklasse
{
    private int $id;
    private string $name;
    private int $schule_id;
    /**
     * @var SchuelerArr[]
     */
    private array $schuelerArr = [];

  /**
   * @param int|null $id
   * @param string|null $name
   * @param int|null $schule_id
   * @throws Exception
   */
    public function __construct(int $id = null, string $name = null, int $schule_id = null)
    {
        if (isset($id) && isset($name) && isset($schule_id)) {
            $this->id = $id;
            $this->name = $name;
            $this->schule_id = $schule_id;
            $this->schuelerArr = (new Schueler())->getAllAsObjects($id);
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
            $sql = "SELECT * FROM schulklasse WHERE id=:id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $schulklasse = $stmt->fetchObject(__CLASS__);
            $schulklasse->schuelerArr = (new Schueler())->getAllAsObjects($id);
            $dbh = null;
        } catch (PDOException $e) {
            throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
        }
        return $schulklasse;
    }

  function getAllAsObjects(int $schule_id): array
  {
    try {
      $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
      $sql = "SELECT * FROM schulklasse WHERE schule_id=:schule_id ";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':schule_id', $schule_id);
      $stmt->execute();
      $schulklassen = [];
      while ($schulklasse = $stmt->fetchObject(__CLASS__)) {
        $schulklasse->schuelerArr = (new Schueler())->getAllAsObjects($schulklasse->id);
        $schulklassen[] = $schulklasse;
      }
      $dbh = null;
    } catch (PDOException $e) {
      throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
    }
    return $schulklassen;
  }
}