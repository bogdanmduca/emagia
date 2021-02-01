<?php

namespace Emagia\Stats;

use LogicException;

class CharacterStat
{
    public $lowerBound = null;
    public $upperBound = null;
    public $baseValue = 0;
    protected $statModifiers = [];
    protected $isDirty = true;
    protected $value;
    protected $lastBaseValue = 0.0;

    public function __construct(int $lowerBound, int $upperBound)
    {
        if ($lowerBound > $upperBound) {
            throw new LogicException("Lower Bound must be lower than upper bound ");
        }
        $this->lowerBound = $lowerBound;
        $this->upperBound = $upperBound;
    }

    public function setBaseValue()
    {
        $this->baseValue = rand($this->lowerBound, $this->upperBound);
    }

    public function addModifier(StatModifier $statModifier)
    {
        $this->isDirty = true;
        $this->statModifiers[] = $statModifier;

        usort($this->statModifiers, function ($a, $b) {
            if ($a->order < $b->order)
                return -1;
            elseif ($a->order > $b->order)
                return 1;
            return 0;
        });
    }

    public function removeModifier(StatModifier $statModifier)
    {
        if (array_key_exists($statModifier, $this->statModifiers)) {
            $this->isDirty = true;
            unset($this->statModifiers[$statModifier]);
            return true;
        }
        return false;
    }

    public function removeAllModifiersFromSource(Object $source)
    {
        $didRemove = false;

        for ($i = count($this->statModifiers) - 1; $i >= 0; $i++) {
            if ($this->statModifiers[$i]->source == $source) {
                $this->isDirty = true;
                $didRemove = false;
                unset($this->statModifiers[$i]);
            }
        }

        return $didRemove;
    }

    public function getValue()
    {
        if ($this->isDirty || $this->baseValue != $this->lastBaseValue) {
            $this->lastBaseValue = $this->baseValue;
            $this->value = $this->calculateFinalValue();
            $this->isDirty = false;
        }
        return $this->value;
    }

    public function calculateFinalValue()
    {
        $finalValue = $this->baseValue;
        $sumPercentAdd = 0;

        for ($i = 0; $i < count($this->statModifiers); $i++) {

            $modifier = $this->statModifiers[$i];
            if ($modifier->type === StatModType::Flat) {
                $finalValue += $modifier->value;
            } elseif ($modifier->type === StatModType::PercentAdd) {
                $sumPercentAdd += $modifier->value;
                if ($i + 1 >= count($this->statModifiers) || $this->statModifiers[$i + 1]->type != StatModType::PercentAdd) {
                    $finalValue *= 1 + $sumPercentAdd;
                    $sumPercentAdd = 0;
                }
            } else if ($modifier->type === StatModType::PercentMult) {
                $finalValue *= 1 + $modifier->value;
            }
        }

        return round($finalValue, 2);
    }
}
