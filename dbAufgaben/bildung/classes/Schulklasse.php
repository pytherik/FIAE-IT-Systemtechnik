<?php

class Schulklasse
{
    private int $id;
    private string $name;
    private int $schuleId;
    /**
     * @var SchuelerArr[]
     */
    private array $schuelerArr = [];

    /**
     * @param int $id
     * @param string $name
     * @param int $schuleId
     */
    public function __construct(int $id = null, string $name = null, int $schuleId = null)
    {
        if (isset($id) && isset($name) && isset($schuleId)) {
            $this->id = $id;
            $this->name = $name;
            $this->schuleId = $schuleId;
            $this->schuelerArr = (new Schueler())->getAllAsObjects($id);
        }
    }

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
}