<?php

namespace Emagia;

class Player
{
    public $name;
    public $character;

    public function __construct(string $name = "Player")
    {
        $this->name = $name;
        $this->character = new Character("Beast");
    }

    public function setCharacter(Character $character)
    {
        $this->character = $character;
    }
}
