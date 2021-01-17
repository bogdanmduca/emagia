<?php

namespace Emagia;

class Round
{
    public $turns;

    public function fight(&$attacker, &$defender)
    {
        // echo "Before attackers turn ---------------<br/>";
        // echo "Attacker life " . $attacker->health . "<br/>";
        // echo "Defender life " . $defender->health . "<br/>";
        $this->takeTurn($attacker, $defender);
        // echo "After attackers turn ---------------<br/>";
        // echo "Attacker life " . $attacker->health . "<br/>";
        // echo "Defender life " . $defender->health . "<br/>";

        if ($defender->stats['Health']->value <= 0)
            return;
        $this->takeTurn($defender, $attacker);
        // echo "After defenders turn ---------------<br/>";
        // echo "Attacker life " . $attacker->health . "<br/>";
        // echo "Defender life " . $defender->health . "<br/></br/>";        
    }

    public function takeTurn(&$attacker, &$defender)
    {
        $turn = new Turn();
        $damage = $this->inflictDamage($attacker, $defender);
        $turn->attacker = $attacker;
        $turn->defender = $defender;
        $turn->damage = $damage;

        $defender->stats['Health']->value -= $damage;
        $turn->defenderLife = $defender->stats['Health']->value;

        $this->turns[] = $turn;
    }

    public function inflictDamage($attacker, $defender)
    {
        $damage = $attacker->stats['Strength']->value - $defender->stats['Defence']->value;

        if ($damage > 0)
            return $damage;
        else {
            return 0;
        }
    }
}
