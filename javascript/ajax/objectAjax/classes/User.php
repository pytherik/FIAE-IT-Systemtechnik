<?php

class User implements JsonSerializable
{
  private string $name;
  private string $time;

  /**
   * @param string $name
   * @param string $time
   */
  public function __construct(string $name, string $time)
  {
    $this->name = $name;
    $this->time = $time;
  }

  //info gibt alle Attribute zurück
  public function getJSONEncode (): false|string
  {
    //info get_object_vars gibt alle Attribute als array zurück.
    // Das will man aber nicht immer haben.
    return json_encode(get_object_vars($this));
  }

  //info mit einer jsonSerialize Methode kann man präzisieren,
  // was zurückgegeben werden soll
  public function jsonSerialize(): array
  {
    return [
      'name' => $this->name,
      'time' => $this->time
    ];
  }
}