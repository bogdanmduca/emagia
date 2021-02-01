<?php

namespace Emagia\Characters;

use Emagia\Stats\CharacterStat;

class Beast extends Character
{
    
    public function __construct()
    {
        parent::__construct("Beast");
        $this->health = new CharacterStat(60, 90);
        $this->strength = new CharacterStat(60, 90);
        $this->defence = new CharacterStat(40, 60);
        $this->speed = new CharacterStat(40, 60);
        $this->luck = new CharacterStat(25, 40);
    }
}
