<?php

namespace Emagia\Characters;

use Emagia\Stats\CharacterStat;

class Character
{
    public $name;

    public $health;
    public $strength;
    public $defence;
    public $speed;
    public $luck;

    public function __construct(
        string $name,
        CharacterStat $health,
        CharacterStat $strength,
        CharacterStat $defence,
        CharacterStat $speed,
        CharacterStat $luck
    ) {
        $this->name = $name;
        $this->health = $health;
        $this->strength  = $strength;
        $this->defence = $defence;
        $this->speed = $speed;
        $this->luck = $luck;
    }

    public function setStats()
    {
        $this->health->setBaseValue();
        $this->strength->setBaseValue();
        $this->defence->setBaseValue();
        $this->speed->setBaseValue();
        $this->luck->setBaseValue();
    }

    /**
     * Calculates the total attack strength
     */
    public function attack()
    {
        echo "<br/>{$this->name} attacks. ";

        return $this->strength->getValue();
    }

    /**
     * Calculates the total defence strength
     */
    public function defence()
    {
        return $this->defence->getValue();
    }

    public function takeDamage($attack)
    {
        echo "<br/>{$this->name} defends. ";

        if (isLucky($this->luck->getValue())) {
            echo "{$this->name} got lucky. No damage taken. <br/>";
            return 0;
        }

        $damage = $attack - $this->defence();

        if ($damage > 0) {
            $this->health->baseValue -= $damage;
        } else {
            $damage =  0;
        }

        echo "{$this->name} takes {$damage} damage. ";

        if ($this->health->baseValue  <= 0) {
            $this->die();
            return $damage;
        }

        echo "Health left {$this->health->baseValue}. <br/>";
        return $damage;
    }

    public function die()
    {
        //    echo "{$this->name} is dead. <br/>";
        die("{$this->name} is dead. <br/>");
    }
}
