<?php

namespace Emagia;

use LogicException;

class Stat
{
    public $name;
    public $lowerBound = null;
    public $upperBound = null;
    public $value = 0;

    public function __construct(string $name = "")
    {
        $this->name = $name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setBoundaries(int $lowerBound, int $upperBound)
    {
        if ($lowerBound > $upperBound) {
            throw new LogicException("Lower Bound must be lower than upper bound ");
        }
        $this->lowerBound = $lowerBound;
        $this->upperBound = $upperBound;
    }
}
