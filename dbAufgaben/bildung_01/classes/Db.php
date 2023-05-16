<?php

class Db
{
  private static object $dbh;

  public static function connect(): object
  {
    if (!isset(self::$dbh)) {
      self::$dbh = new PDO(DB_DSN, DB_USER, DB_PASSWD);
    }
    return self::$dbh;
  }
}