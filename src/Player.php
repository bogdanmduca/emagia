<?php

namespace Emagia;

use Emagia\Characters\Character;

class Player
{
    public $name;
    public $character;

    public function __construct(string $name = "Player")
    {
        $this->name = $name;
    }

    public function setCharacter(Character $character)
    {
        $this->character = $character;
    }
}
