<?php

class Database
{
  private ?string $host = null;
  private ?string $user = null;
  private ?string $pass = null;
  private ?string $dbname = null;

  public function dbConnection(): object
  {
    $this->setupParams();
//    $conn = null;
    try {
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
      ];
      $conn = new PDO(
        "mysql:host=$this->host; dbname=$this->dbname",
        $this->user, $this->pass, $options);
    } catch (PDOException $e) {
      echo "Verbindung fehlgeschlagen: " . $e->getMessage();
      die;
    }
    return $conn;
  }

  private function setupParams(): void
  {
    $conf = parse_ini_file('sql.inc.php');
    $this->host = $conf['host'];
    $this->user = $conf['user'];
    $this->pass = $conf['pass'];
    $this->dbname = $conf['dbname'];
  }

  public function getRandomAll(): object
  {
    try {
      return $this->dbConnection()->query("SELECT * FROM pics ORDER BY RAND()");
    } catch (PDOException $e) {
      echo "Nix da: " . $e->getMessage();
      die;
    }
  }

  public function createDB(array $pathList): void
  {
    $db = $this->dbConnection();
    try {
      $db->query("DROP TABLE IF EXISTS fav2_pics2");
      $db->query("DROP TABLE IF EXISTS pics2");
      $db->query("DROP TABLE IF EXISTS favorites2");
      $db->query("CREATE TABLE pics2 (id INT AUTO_INCREMENT PRIMARY KEY, pic_path VARCHAR(250))");
      $db->query("CREATE TABLE favorites2 (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(25))");
      $db->query("CREATE TABLE fav_pics2 (pic_id INT, fav_id INT, PRIMARY KEY (pic_id, fav_id), 
    CONSTRAINT fk_fav_pics_pics FOREIGN KEY (pic_id) REFERENCES pics2 (id),
    CONSTRAINT fk_fav_pics_favorites FOREIGN KEY (fav_id) REFERENCES favorites2 (id)
    )");
    } catch (PDOException $e) {
      echo "Geht nicht: " . $e->getMessage();
      die;
    }
    foreach ($pathList as $path) {
      $pictures = scandir($path);
      foreach ($pictures as $picture)
        if (!str_starts_with('..', $picture)) {
          $image = trim($path . $picture);
          $db->query("INSERT INTO pics VALUES(NULL, '$image')");
        }
    }
  }

  public function getNumRandomPics(int $num = 3): object
  {
    $db = $this->dbConnection();
    try {
      if ($num == 0) {
        $randomPics = $db->query("SELECT * FROM pics");
      } else {
        $randomPics = $db->query("SELECT * FROM pics ORDER BY RAND() LIMIT $num");
      }
    } catch (PDOException $e) {
      echo "Kann ich nicht: " . $e->getMessage();
      die;
    }
    return $randomPics;
  }
}