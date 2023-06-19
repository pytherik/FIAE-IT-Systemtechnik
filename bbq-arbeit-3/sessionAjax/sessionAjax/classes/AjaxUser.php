<?php


class AjaxUser implements JsonSerializable
{
  private int $id;
  private string $username;
  private string $password;

  /**
   * @param int|null $id
   * @param string|null $name
   * @param string|null $password
   */
  public function __construct(?int $id = null, ?string $name = null, ?string $password = null)
  {
    if (isset($id) && isset($name) && isset($password) && isset($registered_at)) {
      $this->id = $id;
      $this->username = $name;
      $this->password = $password;
    }
  }

  /**
   * @param $username
   * @param $password
   * @return AjaxUser|string
   */
  public function getAjaxUser($username, $password): AjaxUser|string
  {
    try {
      $dbh = AjaxConnect::connect();
      $sql = "SELECT * FROM ajaxuser WHERE username = :username AND password = :password";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam('username', $username);
      $stmt->bindParam('password', $password);
      $stmt->execute();
      $user = $stmt->fetchObject(__CLASS__);
      if ($user) {
        return $user;
      } else {
        return 'Du bist nicht in der Datenbank!';
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
  }

  /**
   * @return array
   */
  public function jsonSerialize(): array
  {
    return [
      'id' => $this->id,
      'name' => $this->username,
    ];
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
  public function getUsername(): string
  {
    return $this->username;
  }

  /**
   * @return string
   */
  public function getPassword(): string
  {
    return $this->password;
  }


}