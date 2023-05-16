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
        if (isset($id) && isset($name) && isset($schuleId)) { echo 'mit Konstruktor<br>';
            $this->id = $id;
            $this->name = $name;
            $this->schuleId = $schuleId;
            $this->schuelerArr = (new Schueler())->getAllAsObjects($id);
        } else {
            // bei $stmt->fetchObject(__CLASS__) wird die Zuweisung
            // $this->schuelerArr = (new Schueler())->getAllAsObjects($id);
            // nicht aufgerufen, deshalb dieses workaround
            if (isset($this->id)){
                $this->schuelerArr = (new Schueler())->getAllAsObjects($this->id);
            }
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

    function getAllAsObjects(int $schuleId = null): array
    {
        try {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
            if (isset($schuleId)) {
                $sql = "SELECT * FROM schulklasse WHERE schuleId=:schuleId ";
                $stmt = $dbh->prepare($sql);
                $stmt->bindParam(':schuleId', $schuleId);
                $stmt->execute();
            } else {
                $sql = "SELECT * FROM schulklasse";
                $stmt = $dbh->query($sql);
            }
            $schulklassen = [];
            while ($schulklasse = $stmt->fetchObject(__CLASS__)) {
                $schulklassen[] = $schulklasse;
            }
            $dbh = null;
        } catch (PDOException $e) {
            throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
        }
        return $schulklassen;
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

    /**
     * @return int
     */
    public function getSchuleId(): int
    {
        return $this->schuleId;
    }

    /**
     * @return array
     */
    public function getSchuelerArr(): array
    {
        return $this->schuelerArr;
    }
}