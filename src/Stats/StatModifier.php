<?php

namespace Emagia\Stats;

class StatModifier
{
    public $value;
    public $type;
    public $order;
    public $source;

    public function __construct(float $value, $type, int $order = 0, Object $source = null)
    {
        $this->value = $value;
        $this->type = $type;
        $this->order = $order;
        $this->source = $source;
    }
}
