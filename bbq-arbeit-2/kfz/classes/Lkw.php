<?php

namespace kfz\classes;

class Lkw extends Kfz
{
  private int $ladevolumen;

  /**
   * @param int $ladevolumen
   */
  public function __construct(int $kfzscheinnummer, float $leistung, int $ladevolumen)
  {
    parent::__construct($kfzscheinnummer, $leistung);
    $this->ladevolumen = $ladevolumen;
  }

  /**
   * @return int
   */
  public function getLadevolumen(): int
  {
    return $this->ladevolumen;
  }
}