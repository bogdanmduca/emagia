<?php

namespace Emagia\Skills;

use Emagia\Characters\Character;
use Emagia\Stats\StatModifier;
use Emagia\Stats\StatModType;

class MagicShield extends Skill
{
    public $name = "Magic Shield";

    public function equip(Character $character)
    {
        $character->defence->addModifier(new StatModifier(0.5, 20, StatModType::PercentMult, 1, $this));
    }

    public function unequip(Character $character)
    {
        $character->defence->removeAllModifiersFromSource($this);
    }
}
