<?php
namespace Tent\classes;
class Tent
{
  private int $maxPersons = 100;
  static int $totalCounter = 0;

  /**
   * @return int
   */
  public static function getTotalCounter(): int
  {
    return self::$totalCounter;
  }

  public function addPerson(int $amount): string
    /*  {
        if (self::$totalCounter + $amount > 100) {
          return 'Is voll! Geh weg!';
        } else {
          self::$totalCounter += $amount;
          return 'Okay, komm rein!';
        }
      }*/
  {
    self::$totalCounter += $amount;
    $say = "Hallo, kommt rein!";
    if (self::$totalCounter > $this->maxPersons) {
      if ((self::$totalCounter - $amount) < $this->maxPersons) {
        $say = "Nur noch " . abs($this->maxPersons - self::$totalCounter) . " Leute!";
      } else {
        $say = "Voll! Geht weg!";
      }
      self::$totalCounter = $this->maxPersons;
    }
    return $say . " Wir sind jetzt " . self::$totalCounter . " !";
  }
}

// Der Andrang wird sehr groß. Erweitere das Programm so, dass wir 2 Eingänge mit 2 Zählern haben.
// Zusammen dürfen maximal 100 Personen in das Zelt.