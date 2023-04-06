<?php /** @noinspection ALL */

namespace garage;

class Garage
{
  private string $name;
  private string $color;

  const MAX_CARS = 2;
  static int $countCars = 0;

  public function __construct(string $name, string $color) {
    if (self::$countCars < $this->MAX_CARS) {
      $this->name = $name;
      $this->color = $color;
      echo "Der ".$color."e $name steht in der Garage!<br>";
      self::$countCars++;
    } else {
      echo "Garage ist voll!"."<br>";
    }
  }
}