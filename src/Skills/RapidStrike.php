<?php

namespace Emagia\Skills;

use Emagia\Characters\Character;
use Emagia\Stats\StatModifier;
use Emagia\Stats\StatModType;

class RapidStrike implements Skill
{
    public function equip(Character $character)
    {
        $character->strength->addModifier(new StatModifier(1, StatModType::PercentMult, 1, $this));
    }

    public function unequip(Character $character)
    {
        $character->strength->removeAllModifiersFromSource($this);
    }
}
