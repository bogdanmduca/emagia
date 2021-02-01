<?php

namespace Emagia\Characters;

class Character
{
    public $name;

    public $health;
    public $strength;
    public $defence;
    public $speed;
    public $luck;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setStats()
    {
        $this->health->setBaseValue();
        $this->strength->setBaseValue();
        $this->defence->setBaseValue();
        $this->speed->setBaseValue();
        $this->luck->setBaseValue();
    }

    public function isLucky()
    {
        return rand(0, 1);
    }

    /**
     * Calculates the total attack strength
     */
    public function attack()
    {
        echo "{$this->name} attacks. <br/>";

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
        $damage = $attack - $this->defence();

        if($this->isLucky() == 1){
            $damage = 0;
            echo "{$this->name} got lucky. No damage taken. <br/>";
            return $damage;
        }

        if ($damage > 0) {
            $this->health->baseValue -= $damage;
        } else {
            $damage =  0;
        }

        echo "{$this->name} takes {$damage} damage. ";

        if ($this->health->baseValue  <= 0){
            $this->die(); 
            return $damage;
        }

        echo "Health left {$this->health->baseValue }. <br/>"; 
        return $damage;
    }

    public function die(){
       echo "{$this->name} is dead. <br/>";
    }
}
