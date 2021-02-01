<?php

namespace Emagia\Characters;

use Emagia\Stats\CharacterStat;

class Orderus extends Character
{
    public function __construct()
    {
        parent::__construct("Orderus");
        $this->health = new CharacterStat(70, 100);
        $this->strength  = new CharacterStat(70, 80);
        $this->defence  = new CharacterStat(45, 55);
        $this->speed = new CharacterStat(45, 50);
        $this->luck = new CharacterStat(10, 30);
    }
}
