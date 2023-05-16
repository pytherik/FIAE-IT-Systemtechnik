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
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id = null, string $name = null)
    {
        if (isset($id) && isset($name)) {
            $this->id = $id;
            $this->name = $name;
            $this->schulen  = (new Schule())->getAllAsObjects($this->id);
        } else {
            //info bei $stmt->fetchObject(__CLASS__) wird die Zuweisung
            // $this->schuelerArr = (new Schueler())->getAllAsObjects($id);
            // nicht aufgerufen, deshalb dieses workaround
            if (isset($this->id)){
                $this->schulen = (new Schule())->getAllAsObjects($this->id);
            }
        }
    }
    public function getObjectById(int $id): Bildungstraeger
    {
        try {
            $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
            $sql = "SELECT * FROM bildungstraeger WHERE id=:id";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $bildungstraeger = $stmt->fetchObject(__CLASS__);
            //$bildungstraeger->schulen = (new Schule())->getAllAsObjects($id);
            $dbh = null;
        } catch (PDOException $e) {
            throw new PDOException('Datenbank sagt nein: ' . $e->getMessage());
        }
        return $bildungstraeger;
    }


}