<?php

namespace Emagia;

use Emagia\Characters\Beast;
use Emagia\Characters\Orderus;
use Emagia\Skills\MagicShield;
use Emagia\Skills\RapidStrike;

class Game
{
    public $battle;

    public function __construct()
    {
        $this->battle = new Battle(10);

        $player1 = new Player("CPU");
        $player1->setCharacter(new Beast());
        $this->battle->addPlayer($player1);

        $player2 = new Player("Player");
        $player2->setCharacter(new Orderus());

        // $magicShield = new MagicShield();
        // $magicShield->equip($player2->character);
        // $rapidStrike = new RapidStrike();
        // $rapidStrike->equip($player2->character);

        $this->battle->addPlayer($player2);
    }

    public function load()
    {
        $winner = $this->battle->start();

        $roundCounter = 1;
        foreach ($this->battle->rounds as $round) {
            echo "<strong>Round {$roundCounter} details</strong> <br/>";
            foreach ($round->turns as $turn) {
                echo "Turn details:<br/>";
                echo  $turn->attacker->name . " attacked " . $turn->defender->name . ".<br/>";
                echo  $turn->attacker->name . " inflicted " . $turn->damage . " damage.<br/>";
                if ($turn->defenderLife > 0)
                    echo  $turn->defender->name . " was left with " . $turn->defenderLife . " health.<br/>";
                else {
                    echo  $turn->defender->name . " was killed by " . $turn->attacker->name . "<br/>";
                }
                echo "<br/>";
            }
            $roundCounter++;
        }

        echo "Winner is " . $winner->name . "</br>";
        echo "Refresh to start again <br/>";
    }
}
