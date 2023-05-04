<?php

class Bicycle
{
  // Zugriffsmodifikatoren (access specifier):
  // protected, private, css
  private int $cadence = 0;
  private int $speed = 0;
  protected int $gear = 1;

  // private bedeutet: Ich kann nur innerhalb dieser Klasse
  // auf diese Attribute zugreifen
  // Beispiel siehe index.php
  /**
   * @param int $newValue
   * @return void
   * $newValue darf nicht negativ sein
   */
  function changeCadence(int $newValue): void
  {
    if ($newValue >= 0) {
      $this->cadence = $newValue;
    }
  }

  /**
   * @param int $newValue
   * @return void
   * $newValue soll nur zwischen 1 und 6 möglich sein
   */
  public function changeGear(int $newValue): void
  {
    if ($newValue > 0 and $newValue < 7) {
      $this->gear = $newValue;
    }
  }

  /**
   * @param int $increment
   * @return void
   */
  public function speedUp(int $increment): void
  {
    $this->speed += $increment;
  }

  /**
   * @param int $decrement
   * @return void
   */
  public function applyBrakes(int $decrement): void
  {
    $this->cadence -= $decrement;
  }

  /**
   * @return void
   */
  public function printStates(): void
  {
    echo "cadence: $this->cadence speed: $this->speed  
    gear: $this->gear<br>";
  }
}
