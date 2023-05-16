<?php

namespace classes;

class Schule
{
    private int $id;
    private string $name;
    private int $bildungstraegerId;
    /**
     * @var Schulklasse[]
     */
    private array $schuelerArr = [];

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name, int $bildungstraegerId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->bildungstraegerId = $bildungstraegerId;
        $this->schulklassen = (new Schuelklasse())->getAllAsObjects();
    }

}