<?php

use classes\Db;

class Schueler
{
    private int $id;
    private string $vorname;
    private string $nachname;
    private int $schulKlasseId;

    /**
     * @param int $id
     * @param string $vorname
     * @param string $nachname
     * @param int $schulKlasseId
     */
    public function __construct(int $id = null, string $vorname = null, string $nachname = null, int $schulKlasseId = null)
    {
        if (isset($id) && isset($vorname) && isset($nachname) && isset($schulKlasseId)) {
            $this->id = $id;
            $this->vorname = $vorname;
            $this->nachname = $nachname;
            $this->schulKlasseId = $schulKlasseId;
        }
    }

    /**
     * @param int $id
     * @return Schueler
     */
    public function getObjectById(int $id): Schueler
    {
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


    function getAllAsObjects(int $schulklasseId = null): array
    {
        try {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
            if (isset($schulklasseId)) {
                $sql = "SELECT * FROM schueler WHERE schulklasseId=:schulklasseId ";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':schulklasseId', $schulklasseId);
                $stmt->execute();
            } else {
                $sql = "SELECT * FROM schueler";
                $stmt = $dbh->query($sql);
            }
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

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}