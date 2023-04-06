<?php

namespace classes;

class Kfz
{
  private int $kfzscheinnummer;
  private float $leistung;

  /**
   * @param int $kfzscheinnummer
   * @param float $leistung
   */
  public function __construct(int $kfzscheinnummer, float $leistung)
  {
    $this->kfzscheinnummer = $kfzscheinnummer;
    $this->leistung = $leistung;
  }

  /**
   * @return int
   */
  public function getKfzscheinnummer(): int
  {
    return $this->kfzscheinnummer;
  }

  /**
   * @return float
   */
  public function getLeistung(): float
  {
    return $this->leistung;
  }

}