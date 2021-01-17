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

    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
    }

    public function setNumberOfRounds(int $number)
    {
        if ($number <= 0)
            throw new OutOfRangeException("Number of rounds must be higher than zero");
        $this->numberOfRounds = $number;
    }


    public function start()
    {
        $this->decideWhoAttacks();
        $this->initalizeCharacterStats($this->attacker->character);
        $this->initalizeCharacterStats($this->defender->character);

        for ($i = 1; $i <= $this->numberOfRounds; $i++) {
            $round = new Round();

            $round->fight($this->attacker->character,  $this->defender->character);

            $this->rounds[] = $round;

            if ($this->defender->character->stats['Health']->value < 0) {
                return $this->attacker;
            }

            if ($this->attacker->character->stats['Health']->value < 0) {
                return $this->defender;
            }
        }

        if ($this->attacker->character->health > $this->defender->character->health)
            return $this->attacker;

        return $this->defender;
    }

    public function initalizeCharacterStats(&$character)
    {
        foreach ($character->stats as $stat) {
            $stat->value = rand($stat->lowerBound, $stat->upperBound);
        }
        // $character->health = rand($character->health->lowerBound, $character->health->upperBound);
        // $character->strength = rand($character->strength->lowerBound, $character->strength->upperBound);
        // $character->defence = rand($character->defence->lowerBound, $character->defence->upperBound);
        // $character->speed = rand($character->speed->lowerBound, $character->speed->upperBound);
        // $character->luck = rand($character->luck->lowerBound, $character->luck->upperBound);
    }

    public function decideWhoAttacks()
    {
        $this->attacker = $this->players[0];
        $this->defender = $this->players[1];

        // foreach ($this->players as $player) {
        //     if ($player->character->speed > $this->attacker->character->speed)
        //         $this->attacker = $player;
        //     elseif ($player->character->speed = $this->attacker->character->speed) {
        //         if ($player->character->luck >= $this->attacker->character->luck) {
        //             $this->attacker = $player;
        //         }
        //     }
        // }
    }
}
