<?php

class Song implements JsonSerializable
{
  private int $id;
  private string $title;
  private string $name;

  /**
   * @param int $id
   * @param string $title
   * @param string $name
   */
  public function __construct(int $id, string $title, string $name)
  {
    $this->id = $id;
    $this->title = $title;
    $this->name = $name;
  }

  public function jsonSerialize(): mixed
  {
    return [
      'id' => $this->id,
      'title' => $this->title,
      'name' => $this->name
    ];
  }
}