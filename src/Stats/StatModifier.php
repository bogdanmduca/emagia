<?php

namespace Emagia\Stats;

class StatModifier
{
    public $value;
    public $type;
    public $order;
    public $source = null;
    public $chance;

    public function __construct(float $value, float $chance, $type, int $order = 0, Object $source = null)
    {
        $this->value = $value;
        $this->type = $type;
        $this->order = $order;
        $this->source = $source;
        $this->chance = $chance;
    }

    public function shouldBeUsed(){
        $lucky = isLucky($this->chance);
        if ($lucky){
            echo $this->source->name(). " is used. ";
            return true;
        }
        return false;
    }
}
