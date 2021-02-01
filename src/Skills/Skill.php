<?php

namespace Emagia\Skills;

use Emagia\Characters\Character;

interface Skill
{
    public function equip(Character $character);
    public function unequip(Character $character);
}
