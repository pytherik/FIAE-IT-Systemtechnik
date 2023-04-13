<?php

class Person
{
  private int $id;
  private string $vorname;
  private string $nachname;
  private string $geburtsdatum;

  /**
   * @param int|null $id
   * @param string|null $vorname
   * @param string|null $nachname
   * @param string|null $geburtsdatum
   */
  public function __construct(int|null    $id = null, string|null $vorname = null,
                              string|null $nachname = null, string|null $geburtsdatum = null)
  {
    if (isset($id) && isset($vorname) && isset($nachname) && isset($geburtsdatum)) {
      $this->id = $id;
      $this->vorname = $vorname;
      $this->nachname = $nachname;
      $this->geburtsdatum = $geburtsdatum;
    }
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
  public function getVorname(): string
  {
    return $this->vorname;
  }

  /**
   * @return string
   */
  public function getNachname(): string
  {
    return $this->nachname;
  }

  /**
   * @return string
   */
  public function getGeburtsdatum(): string
  {
    return $this->geburtsdatum;
  }

  /**
   * @param $personen[]
   * @return void
   */
  public function store(array $personen): void
  {
    foreach ($personen as $person) {
      $content = implode(',', [$person->getId(), $person->getVorname(),
        $person->getNachname(), $person->getGeburtsdatum()]);
      if (file_exists(DATA_PATH)) {
        $separator = "\n";
      } else {
        $separator = "";
      }
      file_put_contents(DATA_PATH, $separator . $content, FILE_APPEND);
    }
  }

  /**
   * @return string
   */
  public function read(): string
  {
    $html = '';
    if (file_exists(DATA_PATH)) {
      $html = "<table>
                  <th>Id</th>
                  <th>Vorname</th>
                  <th>Nachname</th>
                  <th>Geburtstag</th>";
      $persons = explode("\n", file_get_contents(DATA_PATH));
      foreach ($persons as $line) {
        $person = explode(',', $line);
        $html .= "<tr>";
        foreach ($person as $data) {
          $html .= "<td>$data</td>";
        }
        $html .= "</tr>";
      }
      $html .= "</table>";
    }
    return $html;
  }
}