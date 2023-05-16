<?php

class Bildungstraeger
{
    private int $id;
    private string $name;
    /**
     * @var Schule[]
     */
    private array $schulen = [];

  /**
   * @param int|null $id
   * @param string|null $name
   * @throws Exception
   */
    public function __construct(?int $id = null, ?string $name = null)
    {
      if(isset($id) && isset($name)) {
        $this->id = $id;
        $this->name = $name;
        $this->schulen = (new Schule())->getAllAsObjects($id);
      }
    }

  public function getObjectById(int $id): Bildungstraeger
  {
    try {
      $dbh = Db::connect();
      $sql = "SELECT * FROM bildungstraeger WHERE id=:id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      $bildungstraeger = $stmt->fetchObject(__CLASS__);
      $bildungstraeger->schulen = (new Schule())->getAllAsObjects($id);
    } catch (PDOException $e) {
      throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
    }
    return $bildungstraeger;
  }


}