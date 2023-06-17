<?php

class User implements JsonSerializable
{
    private int $id;
    private string $name;
    private string $password;

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
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }



    public function authentify($name, $password) : User|null
    {
        try {
            $dbh = Db::getConnection();
            $sql = "SELECT * FROM user WHERE name=:name AND password=:password";
            $stmt = $dbh->prepare($sql);
            $stmt->bindParam('name', $name);
            $stmt->bindParam('password', $password);
            $stmt->execute();
            return $stmt->fetchObject('User');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function jsonSerialize(): mixed
    {
        return ['id'=>$this->getId(), 'name' => $this->getName()];
        // TODO: Implement jsonSerialize() method.
    }
}