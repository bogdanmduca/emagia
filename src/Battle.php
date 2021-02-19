<?php

namespace Emagia;

use OutOfRangeException;

class Battle
{
    public $players = [];
    public $attacker = null;
    public $defender = null;
    public $numberOfRounds = 10;
    public $rounds = [];

    public function __construct(int $rounds)
    {
        if ($rounds <= 0)
            throw new OutOfRangeException("Number of rounds must be higher than zero");
        $this->numberOfRounds = $rounds;
    }
    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
    }

    public function start()
    {
        $this->initalizeCharacterStats();

        $this->decideWhoAttacks();

        for ($i = 1; $i <= $this->numberOfRounds; $i++) {
            $round = new Round();

            $round->fight($this->attacker->character,  $this->defender->character);

            $this->rounds[] = $round;

            if ($this->defender->character->health->getValue()  < 0) {
                return $this->attacker;
            }

            if ($this->attacker->character->health->getValue()  < 0) {
                return $this->defender;
            }
        }

        if ($this->attacker->character->health->getValue() > $this->defender->character->health->getValue())
            return $this->attacker;

        return $this->defender;
    }

    public function initalizeCharacterStats()
    {
        foreach ($this->players as $player) {
            $player->character->setStats();
            echo "<br/>" . $player->character->name . " stats:<br/>";
            echo "Health " . $player->character->health->baseValue . "<br/>";
            echo "Strength " . $player->character->strength->baseValue . "<br/>";
            echo "Defence " . $player->character->defence->baseValue . "<br/>";
            echo "Speed " . $player->character->speed->baseValue . "<br/>";
            echo "Luck " . $player->character->luck->baseValue . "<br/>";
        }
    }

    public function decideWhoAttacks()
    {
        $attacker = $this->players[0];
        $defender = $this->players[1];

        if ($defender->character->speed->getValue() > $attacker->character->speed->getValue()) {
            $permutation = $defender;
            $defender = $attacker;
            $attacker = $permutation;
        } elseif ($defender->character->speed->getValue() === $attacker->character->speed->getValue()) {
            if ($defender->character->luck->getValue() >= $attacker->character->luck->getValue()) {
                $permutation = $defender;
                $defender = $attacker;
                $attacker = $permutation;
            }
        }

        $this->attacker = $attacker;
        $this->defender = $defender;
    }
}
