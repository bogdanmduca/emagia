<?php

namespace Emagia\Characters;

use Emagia\Stats\CharacterStat;

class Beast extends Character
{

    public function __construct()
    {
        parent::__construct(
            "Beast",
            new CharacterStat(60, 90),
            new CharacterStat(60, 90),
            new CharacterStat(40, 60),
            new CharacterStat(40, 60),
            new CharacterStat(25, 40)
        );
    }
}
