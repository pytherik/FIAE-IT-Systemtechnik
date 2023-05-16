<?php

class Antworten
{
  private int $id;
  private string $answer;
  private bool $is_right;

  /**
   * @param int|null $id
   * @param string|null $answer
   * @param bool|null $isRight
   */
  public function __construct(?int $id = null, string $answer = null, bool $is_right = null)
  {
    if (isset($id) && isset($answer) && isset($is_right)) {
      $this->id = $id;
      $this->answer = $answer;
      $this->is_right = $is_right;
    }
  }

  /**
   * @param $frage
   * @return array|null
   * @throws Exception
   */
  public function getAnswersByQuestion($id): array|null
  {
    try {
      $dbh = new PDO(DB_DNS, DB_USER, DB_PASSWD);
      $sql = "SELECT a.id, answer, is_right FROM antwort a
                            JOIN frage_antwort fa on a.id = fa.antwort_id
                            JOIN frage f on fa.frage_id = f.id
              WHERE f.id = :frage_id";
      $stmt = $dbh->prepare($sql);
      $stmt->bindParam('frage_id', $id);
      $stmt->execute();
      $answers = [];
      while($answer = $stmt->fetchObject(__CLASS__)){
        $answers[] = $answer;
      }
    } catch (PDOException $e) {
      throw new Exception($e->getMessage());
    }
    return $answers;
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
  public function getAnswer(): string
  {
    return $this->answer;
  }

  /**
   * @return bool
   */
  public function is_right(): bool
  {
    return $this->is_right;
  }


}