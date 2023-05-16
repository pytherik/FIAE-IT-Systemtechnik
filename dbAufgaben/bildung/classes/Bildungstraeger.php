<?php

namespace classes;

class Bildungstraeger
{
    private int $id;
    private string $name;
    /**
     * @var Schule[]
     */
    private array $schulen = [];

    /**
     * @param int $id
     * @param string $name
     */
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->schulen = (new Schule())->getAllAsObjects();
    }


}