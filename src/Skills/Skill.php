<?php

namespace Emagia\Skills;

use Emagia\Characters\Character;

abstract class Skill
{
    public $name = null;

    abstract public function equip(Character $character);
    abstract public function unequip(Character $character);

    public function name()
    {
        if (!$this->name)
            return (new \ReflectionClass($this))->getShortName();
        return $this->name;
    }
}
