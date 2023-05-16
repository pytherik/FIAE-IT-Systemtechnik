<?php

class Schule
{
    private int $id;
    private string $name;
    private int $bildungstraegerId;
    /**
     * @var Schulklasse[]
     */
    private array $schulklassen = [];

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id = null, string $name = null, int $bildungstraegerId = null)
    {
        if (isset($id) && isset($name) && isset($bildungstraegerId)) {
            $this->id = $id;
            $this->name = $name;
            $this->bildungstraegerId = $bildungstraegerId;
            $this->schulklassen = (new Schulklasse())->getAllAsObjects($id);
        }else {
            // bei $stmt->fetchObject(__CLASS__) wird die Zuweisung
            // $this->schuelerArr = (new Schueler())->getAllAsObjects($id);
            // nicht aufgerufen, deshalb dieses workaround
            if (isset($this->id)){
                $this->schulklassen = (new Schulklasse())->getAllAsObjects($this->id);
            }
        }
    }

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
    function getAllAsObjects(int $bildungstraegerId = null): array
    {
        try {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
            if (isset($bildungstraegerId)) {
                $sql = "SELECT * FROM schule WHERE bildungstraegerId=:bildungstraegerId ";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':bildungstraegerId', $bildungstraegerId);
                $stmt->execute();
            } else {
                $sql = "SELECT * FROM schule";
                $stmt = $dbh->query($sql);
            }
            $schulen = [];
            while ($schule = $stmt->fetchObject(__CLASS__)) {
                $schulen[] = $schule;
            }
            $dbh = null;
        } catch (PDOException $e) {
            throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
        }
        return $schulen;
    }
}