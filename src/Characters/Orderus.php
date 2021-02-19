<?php

namespace Emagia\Characters;

use Emagia\Stats\CharacterStat;

class Orderus extends Character
{
    public function __construct()
    {
        parent::__construct(
            "Orderus",
            new CharacterStat(70, 100),
            new CharacterStat(70, 80),
            new CharacterStat(45, 55),
            new CharacterStat(45, 50),
            new CharacterStat(10, 30)
        );
    }
}
