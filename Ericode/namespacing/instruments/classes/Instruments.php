<?php

namespace musicstore;

class Instruments
{
  static int $totalInstruments = 0;
  private float $price;
  private string $family;


  public function __construct(float $price, string $family)
  {
    $this->price = $price;
    $this->family = $family;
    self::$totalInstruments ++;
    echo __NAMESPACE__."<br/>";

  }

  public function getPrice(): string
  {
    return $this->price;
  }

  public function setPrice($newPrice): void
  {
     $this->price = $newPrice;
  }

  public function getFamily(): string
  {
    return $this->family;
  }
}