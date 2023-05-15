<?php

class PageCounter
{
  public static int $pageNum = 1;

  /**
   * @return int
   */
  public static function getPageNum(): int
  {
    return self::$pageNum;
  }

  public static function increasePageNum(): void
  {
    self::$pageNum++;
  }

  public static function decreasePageNum(): void
  {
    self::$pageNum--;
  }
}