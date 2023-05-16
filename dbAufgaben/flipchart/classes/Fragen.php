<?php

class Fragen
{
  private int $id;
  private string $question;
  private int $thema_id;
  /**
   * @var array
   */
  private array $answers;

  public function __construct(?int $id = null, ?string $question = null, ?int $thema_id = null)
  {
    if (isset($id) && isset($question) && isset($thema_id)) {
      $this->id = $id;
      $this->question = $question;
      $this->thema_id = $thema_id;
      $this->answers = (new Antworten())->getAnswersByQuestion($id);
    }
  }

  /**
   * @return array|null
   * @throws Exception
   */
  public function getAllAsObjects(): array|null
  {
    try {
      $dbh = new PDO(DB_DNS, DB_USER, DB_PASSWD);
      $sql = "SELECT * FROM frage";
      $result = $dbh->query($sql);
      $fragen = [];
      while ($frage = $result->fetchObject(__CLASS__)){
        $frage->answers = (new Antworten())->getAnswersByQuestion($frage->id);
        $fragen[] = $frage;
      }
    } catch (PDOException $e) {
      throw new Exception($e->getMessage());
    }
    return $fragen;

  }

  public function getRandQuestionsAsObjects(array $subjects, int $numQuestions): array
  {
    try {
      $dbh = new PDO(DB_DNS, DB_USER, DB_PASSWD);
      foreach ($subjects as $subject) {
        for ($i = 0; $i < $numQuestions ; $i++) {
        $sql = "SELECT f.id, question, thema_id FROM frage f 
                              JOIN frage_thema ft on f.id = ft.frage_id
                              JOIN thema t on ft.thema_id = t.id
                              WHERE thema_id = $subject ORDER BY RAND() LIMIT 1";
        $stmt = $dbh->query($sql);
        while ($frage = $stmt->fetchObject(__CLASS__)) {
          $frage->answers = (new Antworten())->getAnswersByQuestion($frage->id);
          $questions[] = $frage;
        }
        }
      }
      shuffle($questions);
    } catch (PDOException $e) {
      echo $e->getMessage();
      die();
    }
    return array_slice($questions, 0, $numQuestions);
  }

  public function getAnswers(int $id, $dbh): array
  {
    $answers = [];
    $sql = "SELECT answer, is_right 
FROM antwort 
    JOIN frage_antwort fa on antwort.id = fa.antwort_id 
    JOIN frage f on fa.frage_id = f.id
    WHERE f.id = $id";
    $result = $dbh->query($sql);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $answers[] = $row['answer'];
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
   * @param int $id
   */
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getQuestion(): string
  {
    return $this->question;
  }

  /**
   * @param string $question
   */
  public function setQuestion(string $question): void
  {
    $this->question = $question;
  }

  /**
   * @return int
   */
  public function getThemaId(): int
  {
    return $this->thema_id;
  }

  /**
   * @param int $thema_id
   */
  public function setThemaId(int $thema_id): void
  {
    $this->thema_id = $thema_id;
  }
}