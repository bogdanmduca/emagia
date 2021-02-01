<?php

namespace Emagia;

class Round
{
    public $turns;

    public function fight(&$attacker, &$defender)
    {
        $this->takeTurn($attacker, $defender);

        if ($defender->health->getValue() <= 0)
            return;
        $this->takeTurn($defender, $attacker);
    }

    public function takeTurn(&$attacker, &$defender)
    {
        $turn = new Turn();

        $turn->attacker = $attacker;
        $turn->defender = $defender;
        $turn->damage = $defender->takeDamage($attacker->attack());
        $turn->defenderLife = $defender->health->getValue();

        $this->turns[] = $turn;
    }
}
