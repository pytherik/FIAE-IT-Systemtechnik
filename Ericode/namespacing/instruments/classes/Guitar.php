<?php

namespace musicstore;

class Guitar extends Instruments
{
  static int $totalGuitars = 0;
  private int $numStrings;
  private string $materialCorpus;
  private string $materialFretboard;

  public function __construct(float $price, string $family, int $numStrings, string $materialCorpus = 'unknown', string $materialFretboard = 'unknown')
  {
    parent::__construct($price, $family);
    $this->numStrings = $numStrings;
    $this->materialCorpus = $materialCorpus;
    $this->materialFretboard = $materialFretboard;
    self::$totalGuitars ++;
  }

  public function getNumStrings(): string
  {
    return $this->numStrings;
  }

  public function getMaterialCorpus(): string
  {
    return $this->materialCorpus;
  }

  public function getMaterialFretboard(): string
  {
    return $this->materialFretboard;
  }
}