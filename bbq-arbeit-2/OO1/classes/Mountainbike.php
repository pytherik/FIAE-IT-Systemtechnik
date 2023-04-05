<?php

class Mountainbike extends Bicycle
{
  private bool $suspension = false;

  /**
   * @param bool $hasSuspension
   * @return void
   */
  public function setSuspension(bool $hasSuspension): void
  {
    $this->suspension = $hasSuspension;
  }

  /**
   * @return string
   */
  public function getSuspensionStatus(): string
  {
    if ($this->suspension) {
      return "Federung: Eingebaut<br>";
    } else {
      return "Federung: fehlt<br>";
    }
  }
  // printStatus() soll für Mauntainbikes ein anderes Ergebnis Liefern
  // als für Bicycles. Das nennt man überschreiben.

  /**
   * @return void
   */
  public function printStates(): void
  {
    parent::printStates(); //
    echo $this->getSuspensionStatus() . "<br";
  }

  public function callParent()
  {
    // damit ich auf ein Attribut der Elternklasse zugrifen kann, muss
    // dieses als protected gesetzt sein;
    $this->gear = 2;
  }
}
