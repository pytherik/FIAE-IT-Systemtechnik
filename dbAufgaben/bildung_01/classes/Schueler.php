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
   * @param string|null $nachname
   * @param int|null $schulklasse_id
   */
    public function __construct(int $id = null, string $vorname = null, string $nachname = null, int $schulklasse_id = null)
    {
        if (isset($id) && isset($vorname) && isset($nachname) && isset($schulklasse_id)) {
            $this->id = $id;
            $this->vorname = $vorname;
            $this->nachname = $nachname;
            $this->schulklasse_id = $schulklasse_id;
        }
        //return $this;
    }

    /**
     * @param int $id
     * @return Schueler
     */
    public function getObjectById(int $id):Schueler{
        try {
            $dbh = Db::connect();
            $sql = "SELECT * FROM schueler WHERE id=:id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $schueler = $stmt->fetchObject(__CLASS__);

            $dbh = null;
        } catch (PDOException $e) {
            throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
        }
        return $schueler;
    }


    function getAllAsObjects(int $schulklasse_id): array
    {
        try {
            $dbh = Db::connect();
            $sql = "SELECT * FROM schueler WHERE schulklasse_id=:schulklasseId ";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':schulklasseId', $schulklasse_id);
            $stmt->execute();
            $schuelerArr = [];
            while ($schueler = $stmt->fetchObject(__CLASS__)) {
                $schuelerArr[] = $schueler;
            }
            $dbh = null;
        } catch (PDOException $e) {
            throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
        }
        return $schuelerArr;
    }
}