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
//    self::$totalCounter += $amount;
    if (self::$totalCounter >= $this->maxPersons) {
      $say = "Voll! Geht weg!";
    } else if ((self::$totalCounter + $amount) > $this->maxPersons) {
        $say = "Oh, ihr seid zu ".$amount."t!<br>Ich kann aber leider nur noch " . $this->maxPersons - self::$totalCounter . " Leute reinlassen!";
      self::$totalCounter = $this->maxPersons;
    } else {
      $say = "Hallo ihr $amount! Willkommen im Club!";
      self::$totalCounter += $amount;
    }
    return $say . " Wir sind jetzt " . self::$totalCounter . " !";
  }
}

// Der Andrang wird sehr groß. Erweitere das Programm so, dass wir 2 Eingänge mit 2 Zählern haben.
// Zusammen dürfen maximal 100 Personen in das Zelt.