<?php

namespace garage;

class Garage
{
  private string $name;
  private string $color;

  private int $maxCars = 2;
  static int $countCars = 0;

  public function __construct(string $name, string $color) {
    if (self::$countCars <= $this->maxCars) {
      $this->name = $name;
      $this->color = $color;
      self::$countCars++;
    } else {
      echo "Garage ist voll!"."<br>";
    }
  }
}